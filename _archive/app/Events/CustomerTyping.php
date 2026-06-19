<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CustomerTyping implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $conversationId;
    public $isTyping;

    public function __construct($conversationId, $isTyping = true)
    {
        $this->conversationId = $conversationId;
        $this->isTyping = $isTyping;
    }

    public function broadcastOn()
    {
        return [new Channel('agent.conversation.' . $this->conversationId)];
    }

    public function broadcastAs()
    {
        return 'customer.typing';
    }
}
