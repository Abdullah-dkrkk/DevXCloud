<?php

namespace App\Mail;

use App\Models\ChatTicket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

class AdminAgentTicketNotification extends Mailable implements ShouldQueue
{
    use Queueable;

    public $ticket;
    public $formTypeLabel;
    public $role;

    public function __construct(ChatTicket $ticket, string $role = 'Admin')
    {
        $this->ticket = $ticket;
        $this->role = $role;
        $this->formTypeLabel = match ($ticket->form_type) {
            'guidance' => 'Personalized Guidance',
            'discovery' => 'Growth Discovery Call',
            default => ucfirst($ticket->form_type),
        };
    }

    public function build()
    {
        return $this
            ->subject('New Support Request - ' . $this->ticket->ticket_number . ' from ' . $this->ticket->name)
            ->view('emails.admin-agent-ticket-notification');
    }
}
