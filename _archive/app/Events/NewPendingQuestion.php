<?php

namespace App\Events;

use App\Models\ChatHistory;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewPendingQuestion implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $question;
    public $questionId;
    public $userName;

    public function __construct(ChatHistory $chatHistory)
    {
        $this->question = $chatHistory->question;
        $this->questionId = $chatHistory->id;
        $this->userName = $chatHistory->user?->name ?? 'Guest';
    }

    public function broadcastOn()
    {
        return [new Channel('agent.questions')];
    }

    public function broadcastAs()
    {
        return 'new.pending.question';
    }
}
