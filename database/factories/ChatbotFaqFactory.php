<?php

namespace Database\Factories;

use App\Models\ChatbotFaq;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChatbotFaqFactory extends Factory
{
    protected $model = ChatbotFaq::class;

    public function definition(): array
    {
        return [
            'question' => $this->faker->sentence(),
            'answer' => $this->faker->paragraph(),
        ];
    }

    public function forDevXCloud(): static
    {
        return $this->state(fn(array $attr) => [
            'question' => 'What is DevXCloud|Tell me about DevXCloud|devxcloud',
            'answer' => 'DevXCloud is a growth system that builds AI-powered sales funnels, automations, and retention engines for businesses.',
        ]);
    }
}
