<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Mail\Mailable;

class LeadWelcome extends Mailable
{
    public $user;
    public $password;

    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    public function build()
    {
        return $this
            ->subject('Welcome to DevXCloud — Your Account Details')
            ->view('emails.lead-welcome');
    }
}
