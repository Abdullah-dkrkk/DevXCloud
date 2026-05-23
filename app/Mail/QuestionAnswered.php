<?php

namespace App\Mail;

use App\Models\ChatHistory;
use Illuminate\Mail\Mailable;

class QuestionAnswered extends Mailable
{
    public $question;

    public function __construct(ChatHistory $question)
    {
        $this->question = $question;
    }

    public function build()
    {
        return $this
            ->subject('Your Question Has Been Answered')
            ->view('emails.question-answered');
    }
}
