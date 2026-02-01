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
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'job_title'  => 'nullable|string|max:100',
            'work_email' => 'required|email|max:255',
            'company'    => 'required|string|max:100',
            'employed'   => 'required|in:yes,no',
            'mobile'     => 'required|string|min:7|max:20',
            'country'    => 'required|string',
            'language'   => 'required|string',
            'terms'      => 'required|accepted',
        ];
    }

    public function messages()
    {
        return [
            'terms.accepted' => 'You must accept the Terms of Service and Privacy Policy.',
        ];
    }
}
