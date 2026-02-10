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
            // Basic required fields
            'full_name'   => 'required|string|max:100',
            'work_email'  => 'required|email|max:255',
            'company'     => 'required|string|max:150',

            // Location & contact (UPDATED)
            'country'     => 'required|string|max:100',
            'state'       => 'required|string|max:100',
            'phone'       => 'required|string|min:7|max:20',

            // Website logic (UPDATED dropdown)
            'has_website' => 'required|in:yes,no',
            'website_url' => 'required_if:has_website,yes|nullable|url|max:255',

            // Context
            'reason'      => 'nullable|string|max:100',
            'message'     => 'nullable|string|max:2000',
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
        ];
    }
}
