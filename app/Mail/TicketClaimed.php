<?php

namespace App\Mail;

use App\Models\ChatTicket;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

class TicketClaimed extends Mailable implements ShouldQueue
{
    public $ticket;
    public $agent;
    public $reengagementUrl;

    public function __construct(ChatTicket $ticket, User $agent)
    {
        $this->ticket = $ticket;
        $this->agent = $agent;
        $this->reengagementUrl = route('chat.reengage', [
            'ticket_id' => $ticket->id,
            'token' => sha1($ticket->id . $ticket->email . 'devxcloud-salt')
        ]);
    }

    public function build()
    {
        return $this
            ->subject('Your Ticket Has Been Claimed - ' . $this->ticket->ticket_number)
            ->view('emails.ticket-claimed');
    }
}
