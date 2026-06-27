<?php

namespace App\Mail;

use App\Models\ChatTicket;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

class TicketClosed extends Mailable implements ShouldQueue
{
    use Queueable;

    public $ticket;
    public $closedBy;
    public $isAdminNotification;
    public $formTypeLabel;
    public $reengagementUrl;
    public $closedByLabel;

    public function __construct(ChatTicket $ticket, ?User $closedBy = null, bool $isAdminNotification = false, ?string $closedByLabel = null)
    {
        $this->ticket = $ticket;
        $this->closedBy = $closedBy;
        $this->isAdminNotification = $isAdminNotification;
        $this->formTypeLabel = $this->resolveFormTypeLabel();
        $this->reengagementUrl = route('chat.reengage', [
            'ticket_id' => $ticket->id,
            'token' => sha1($ticket->id . $ticket->email . 'devxcloud-salt')
        ]);
        $this->closedByLabel = $closedByLabel ?? $closedBy?->name ?? 'Auto-close System';
    }

    public function build()
    {
        return $this
            ->subject($this->isAdminNotification
                ? 'Ticket Closed - ' . $this->ticket->ticket_number . ' by ' . $this->closedByLabel
                : 'Your Ticket Has Been Closed - ' . $this->ticket->ticket_number)
            ->view('emails.ticket-closed');
    }

    private function resolveFormTypeLabel(): string
    {
        return match ($this->ticket->form_type) {
            'guidance' => 'Personalized Guidance',
            'discovery' => 'Growth Discovery Call',
            default => ucfirst($this->ticket->form_type),
        };
    }
}
