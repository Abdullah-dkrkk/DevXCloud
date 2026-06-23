<?php

namespace Database\Factories;

use App\Models\ChatMessage;
use App\Models\ChatTicket;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChatMessageFactory extends Factory
{
    protected $model = ChatMessage::class;

    public function definition(): array
    {
        return [
            'ticket_id' => ChatTicket::factory(),
            'sender_id' => null,
            'sender_type' => 'user',
            'message' => $this->faker->sentence(),
            'options' => null,
            'created_at' => now(),
        ];
    }

    public function bot(): static
    {
        return $this->state(fn(array $attr) => [
            'sender_type' => 'bot',
            'sender_id' => null,
        ]);
    }

    public function agent(int $userId): static
    {
        return $this->state(fn(array $attr) => [
            'sender_type' => 'agent',
            'sender_id' => $userId,
        ]);
    }
}
