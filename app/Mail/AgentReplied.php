<?php

namespace App\Mail;

use App\Models\ChatTicket;
use App\Models\ChatMessage;
use Illuminate\Mail\Mailable;

class AgentReplied extends Mailable
{
    public $ticket;
    public $message;
    public $reengagementUrl;

    public function __construct(ChatTicket $ticket, ChatMessage $message)
    {
        $this->ticket = $ticket;
        $this->message = $message;
        $this->reengagementUrl = route('chat.reengage', [
            'ticket_id' => $ticket->id,
            'token' => sha1($ticket->id . $ticket->email . 'devxcloud-salt')
        ]);
    }

    public function build()
    {
        return $this
            ->subject('New Response - ' . $this->ticket->ticket_number)
            ->view('emails.agent-replied');
    }
}
