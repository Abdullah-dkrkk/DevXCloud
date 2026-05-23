<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Http;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'full_name'   => 'required|string|max:100',
            'work_email'  => 'required|email|max:255',
            'company'     => 'required|string|max:150',
            'country'     => 'required|string|max:100',
            'state'       => 'required|string|max:100',
            'phone'       => 'required|string|min:7|max:20',
            'has_website' => 'required|in:yes,no',
            'website_url' => 'required_if:has_website,yes|nullable|url|max:255',
            'reason'      => 'nullable|max:100',
            'message'     => 'nullable|string|max:2000',
            'g-recaptcha-response' => (app()->environment('local'))
                ? 'nullable'
                : ['required', function ($attribute, $value, $fail) {
                    $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                        'secret' => config('services.recaptcha.secret_key'),
                        'response' => $value,
                        'remoteip' => $this->ip(),
                    ]);

                    $body = $response->json();

                    if (!($body['success'] ?? false)) {
                        $fail('reCAPTCHA verification failed. Please try again.');
                    }

                    if (($body['score'] ?? 0) < 0.5) {
                        $fail('reCAPTCHA score too low. Please try again.');
                    }
                }],
        ];
    }

    public function messages()
    {
        return [
            'full_name.required'        => 'Please enter your full name.',
            'work_email.required'       => 'Please enter a valid work email.',
            'work_email.email'          => 'Please enter a valid email address.',
            'company.required'          => 'Company name is required.',
            'country.required'          => 'Please select your country.',
            'state.required'            => 'Please enter your state.',
            'phone.required'            => 'Phone number is required.',
            'has_website.required'      => 'Please select whether you have a website.',
            'has_website.in'            => 'Invalid website selection.',
            'website_url.required_if'   => 'Please enter your website URL.',
            'website_url.url'           => 'Please enter a valid website URL.',
            'g-recaptcha-response.required' => 'reCAPTCHA verification is required.',
        ];
    }
}
