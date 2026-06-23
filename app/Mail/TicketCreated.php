<?php

namespace App\Mail;

use App\Models\ChatTicket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class TicketCreated extends Mailable
{
    use Queueable;

    public $ticket;
    public $reengagementUrl;
    public $isAdminNotification;

    public function __construct(ChatTicket $ticket, bool $isAdminNotification = false)
    {
        $this->ticket = $ticket;
        $this->isAdminNotification = $isAdminNotification;
        $this->reengagementUrl = route('chat.reengage', [
            'ticket_id' => $ticket->id,
            'token' => sha1($ticket->id . $ticket->email . 'devxcloud-salt')
        ]);
    }

    public function build()
    {
        return $this
            ->subject($this->isAdminNotification
                ? 'New Ticket: ' . $this->ticket->ticket_number . ' from ' . $this->ticket->name
                : 'Ticket Created - ' . $this->ticket->ticket_number)
            ->view('emails.ticket-created');
    }
}
