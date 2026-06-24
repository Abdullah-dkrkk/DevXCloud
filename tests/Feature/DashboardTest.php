<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\ChatTicket;
use App\Models\ChatMessage;
use App\Livewire\Agent\Dashboard;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_messages_appear_when_ticket_selected(): void
    {
        $ticket = ChatTicket::factory()->create();

        ChatMessage::create([
            'ticket_id' => $ticket->id,
            'sender_type' => 'user',
            'message' => 'I need help with my account',
            'created_at' => now(),
        ]);

        $agent = User::factory()->create(['role' => 'agent']);

        $component = Livewire::actingAs($agent)->test(Dashboard::class);
        $component->call('selectTicket', $ticket->id);

        $component->assertSet('selectedTicketId', $ticket->id);
        $messages = collect($component->get('messages'));
        $this->assertCount(1, $messages);
        $this->assertEquals('I need help with my account', $messages->first()['message']);
        $this->assertEquals('user', $messages->first()['sender_type']);
    }

    public function test_messages_loaded_on_every_render(): void
    {
        $ticket = ChatTicket::factory()->create();

        $agent = User::factory()->create(['role' => 'agent']);

        $component = Livewire::actingAs($agent)->test(Dashboard::class);
        $component->call('selectTicket', $ticket->id);

        $this->assertCount(0, $component->get('messages'));

        ChatMessage::create([
            'ticket_id' => $ticket->id,
            'sender_type' => 'user',
            'message' => 'Customer message after load',
            'created_at' => now(),
        ]);

        $component->call('$refresh');

        $messages = collect($component->get('messages'));
        $this->assertCount(1, $messages);
        $this->assertEquals('Customer message after load', $messages->first()['message']);
    }

    public function test_no_messages_when_no_ticket_selected(): void
    {
        $agent = User::factory()->create(['role' => 'agent']);

        $component = Livewire::actingAs($agent)->test(Dashboard::class);

        $this->assertNull($component->get('selectedTicketId'));
        $this->assertCount(0, $component->get('messages'));
    }

    public function test_customer_message_appears_in_mixed_conversation(): void
    {
        $ticket = ChatTicket::factory()->create();
        $agent = User::factory()->create(['role' => 'agent']);

        ChatMessage::create([
            'ticket_id' => $ticket->id,
            'sender_type' => 'user',
            'message' => 'Hello, I have a question',
            'created_at' => now()->subMinutes(5),
        ]);

        ChatMessage::create([
            'ticket_id' => $ticket->id,
            'sender_id' => $agent->id,
            'sender_type' => 'agent',
            'message' => 'Sure, how can I help?',
            'created_at' => now()->subMinutes(4),
        ]);

        ChatMessage::create([
            'ticket_id' => $ticket->id,
            'sender_type' => 'user',
            'message' => 'I need help with pricing',
            'created_at' => now()->subMinutes(3),
        ]);

        $component = Livewire::actingAs($agent)->test(Dashboard::class);
        $component->call('selectTicket', $ticket->id);

        $messages = collect($component->get('messages'));
        $this->assertCount(3, $messages);
        $this->assertEquals('Hello, I have a question', $messages[0]['message']);
        $this->assertEquals('user', $messages[0]['sender_type']);
        $this->assertEquals('agent', $messages[1]['sender_type']);
        $this->assertEquals('user', $messages[2]['sender_type']);
    }
}
