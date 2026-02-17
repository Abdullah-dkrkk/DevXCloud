<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactFormSubmitted extends Mailable
{
    public $contact;

    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this
            ->subject('New Contact Form Submission')
            ->view('emails.contact');
    }
}
