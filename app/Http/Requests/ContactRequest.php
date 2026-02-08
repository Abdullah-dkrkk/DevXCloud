<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // Required fields
            'full_name'   => 'required|string|max:100',
            'work_email'  => 'required|email|max:255',
            'company'     => 'required|string|max:150',
            'phone'       => 'required|string|min:7|max:20',
            'country'     => 'required|string|max:100',

            // Website logic
            'has_website' => 'required|in:yes,no',
            'website_url'=> 'required_if:has_website,yes|nullable|url|max:255',

            // Context (optional)
            'reason'      => 'nullable|string|max:100',
            'message'     => 'nullable|string|max:2000',
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Please enter your full name.',
            'work_email.required' => 'Please enter a valid work email.',
            'company.required' => 'Company name is required.',
            'phone.required' => 'Phone number is required.',
            'country.required' => 'Country is required.',
            'has_website.required' => 'Please select whether you have a website.',
            'website_url.required_if' => 'Please enter your website URL.',
        ];
    }
}
