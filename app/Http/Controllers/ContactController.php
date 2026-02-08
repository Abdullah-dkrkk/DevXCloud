<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(ContactRequest $request)
    {
        $data = $request->validated();

        Contact::create([
            'full_name'    => $data['full_name'],
            'work_email'   => $data['work_email'],
            'company'      => $data['company'],
            'phone'        => $data['phone'],
            'country'      => $data['country'],
            'has_website'  => $data['has_website'] ?? null,
            'website_url'  => $data['website_url'] ?? null,
            'reason'       => $data['reason'] ?? null,
            'message'      => $data['message'] ?? null,

            // Meta
            'ip_address'   => $request->ip(),
            'user_agent'   => $request->userAgent(),
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        return back()->with('success', 'Thank you! Your message has been submitted successfully.');
    }
}
