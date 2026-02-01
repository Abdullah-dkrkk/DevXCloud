<?php

namespace App\Http\Controllers;
use App\Models\Contact;

use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function submit(ContactRequest $request)
    {
        $data = $request->validated();

        Contact::create([
            ...$data,
            'terms_accepted' => true,
            'terms_accepted_at' => now(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'Thank you! Your message has been submitted successfully.');
    }
}
