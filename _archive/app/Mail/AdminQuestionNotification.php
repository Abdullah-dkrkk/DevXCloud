<?php

namespace App\Mail;

use App\Models\ChatHistory;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminQuestionNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $question;

    public function __construct(ChatHistory $question)
    {
        $this->question = $question;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Customer Question — DevXCloud Support',
        );
    }

    public function content(): Content
    {
        $userName = $this->question->user?->name ?? 'Guest';
        $userEmail = $this->question->user?->email ?? 'No email';
        $questionText = $this->question->question;

        return new Content(
            view: 'emails.admin-question-notification',
            with: [
                'userName' => $userName,
                'userEmail' => $userEmail,
                'questionText' => $questionText,
                'questionId' => $this->question->id,
                'dashboardUrl' => route('admin.agent.dashboard'),
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
