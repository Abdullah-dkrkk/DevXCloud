<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AgentTyping implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sessionId;
    public $userId;
    public $isTyping;

    public function __construct($sessionId, $userId = null, $isTyping = true)
    {
        $this->sessionId = $sessionId;
        $this->userId = $userId;
        $this->isTyping = $isTyping;
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
        return 'agent.typing';
    }
}
