<?php

namespace App\Mail;

use App\Models\ChatTicket;
use Illuminate\Mail\Mailable;

class TicketAutoClose extends Mailable
{
    public $ticket;
    public $reengagementUrl;

    public function __construct(ChatTicket $ticket)
    {
        $this->ticket = $ticket;
        $this->reengagementUrl = route('chat.reengage', [
            'ticket_id' => $ticket->id,
            'token' => sha1($ticket->id . $ticket->email . 'devxcloud-salt')
        ]);
    }

    public function build()
    {
        return $this
            ->subject('Ticket Closing Soon - ' . $this->ticket->ticket_number)
            ->view('emails.ticket-auto-close');
    }
}
