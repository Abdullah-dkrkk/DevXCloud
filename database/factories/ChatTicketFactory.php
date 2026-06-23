<?php

namespace Database\Factories;

use App\Models\ChatTicket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChatTicketFactory extends Factory
{
    protected $model = ChatTicket::class;

    public function definition(): array
    {
        return [
            'ticket_number' => 'DEVX-' . strtoupper(substr(uniqid(), -6)),
            'user_id' => User::factory(),
            'session_id' => $this->faker->uuid(),
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'form_type' => 'guidance',
            'form_data' => [],
            'status' => 'pending',
            'last_activity_at' => now(),
        ];
    }

    public function withEmail(string $email): static
    {
        return $this->state(fn(array $attr) => [
            'email' => $email,
            'user_id' => User::factory()->create(['email' => $email])->id,
        ]);
    }
}
