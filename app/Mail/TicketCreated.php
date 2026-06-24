<?php

namespace App\Mail;

use App\Models\ChatTicket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

class TicketCreated extends Mailable implements ShouldQueue
{
    use Queueable;

    public $ticket;
    public $reengagementUrl;
    public $isAdminNotification;
    public $formTypeLabel;
    public $formFields;

    public function __construct(ChatTicket $ticket, bool $isAdminNotification = false)
    {
        $this->ticket = $ticket;
        $this->isAdminNotification = $isAdminNotification;
        $this->reengagementUrl = route('chat.reengage', [
            'ticket_id' => $ticket->id,
            'token' => sha1($ticket->id . $ticket->email . 'devxcloud-salt')
        ]);
        $this->formTypeLabel = $this->resolveFormTypeLabel();
        $this->formFields = $this->resolveFormFields();
    }

    public function build()
    {
        return $this
            ->subject($this->isAdminNotification
                ? 'New Ticket: ' . $this->ticket->ticket_number . ' from ' . $this->ticket->name
                : 'Ticket Created - ' . $this->ticket->ticket_number)
            ->view('emails.ticket-created');
    }

    private function resolveFormTypeLabel(): string
    {
        return match ($this->ticket->form_type) {
            'guidance' => 'Personalized Guidance',
            'discovery' => 'Growth Discovery Call',
            default => ucfirst($this->ticket->form_type),
        };
    }

    private function resolveFormFields(): array
    {
        $data = $this->ticket->form_data ?? [];
        if (empty($data)) return [];

        $fields = [];
        foreach ($data as $key => $value) {
            $label = match ($key) {
                'business_name' => 'Business Name',
                'business_type' => 'Business Type',
                'question' => 'Your Question',
                'stage' => 'Current Stage',
                'challenge' => 'Biggest Challenge',
                default => ucfirst(str_replace('_', ' ', $key)),
            };
            $fields[] = ['label' => $label, 'value' => $value];
        }

        return $fields;
    }
}
