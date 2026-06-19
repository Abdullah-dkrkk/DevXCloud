<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AgentMessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $sessionId;
    public $userId;
    public $chatHistoryId;

    public function __construct($message, $sessionId, $userId = null, $chatHistoryId = null)
    {
        $this->message = $message;
        $this->sessionId = $sessionId;
        $this->userId = $userId;
        $this->chatHistoryId = $chatHistoryId;
    }

    public function broadcastOn()
    {
        if ($this->userId) {
            return [new PrivateChannel('conversation.user.' . $this->userId)];
        }
        return [new Channel('conversation.guest.' . $this->sessionId)];
    }

    public function broadcastAs()
    {
        return 'agent.message.sent';
    }
}
