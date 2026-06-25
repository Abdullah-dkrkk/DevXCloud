<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\ChatTicket;
use App\Models\ChatMessage;
use App\Models\ChatbotFaq;
use App\Models\ChatHistory;
use App\Mail\TicketCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChatControllerTest extends TestCase
{
    use RefreshDatabase;

    // ─── HELPERS ───────────────────────────────────────────────────────

    private function createAgent(array $overrides = []): User
    {
        return User::factory()->create(array_merge([
            'role' => 'agent',
            'is_available' => true,
            'last_active_at' => now(),
        ], $overrides));
    }

    private function createTicket(array $overrides = []): ChatTicket
    {
        return ChatTicket::factory()->create($overrides);
    }

    private function createFaq(string $question, string $answer): ChatbotFaq
    {
        return ChatbotFaq::create(['question' => $question, 'answer' => $answer]);
    }

    // ─── AGENT STATUS TESTS ────────────────────────────────────────────

    public function test_agent_status_false_when_no_agents(): void
    {
        $res = $this->getJson('/chat/agent-status');

        $res->assertOk()->assertJson(['available' => false]);
    }

    public function test_agent_status_returns_true_when_agent_available(): void
    {
        User::factory()->create([
            'role' => 'agent',
            'is_available' => true,
        ]);

        $res = $this->getJson('/chat/agent-status');

        $res->assertOk()->assertJson(['available' => true]);
    }

    public function test_agent_status_false_when_agent_not_available(): void
    {
        User::factory()->create([
            'role' => 'agent',
            'is_available' => false,
        ]);

        $res = $this->getJson('/chat/agent-status');

        $res->assertOk()->assertJson(['available' => false]);
    }

    public function test_agent_offline_marks_unavailable(): void
    {
        $agent = User::factory()->create([
            'role' => 'agent',
            'is_available' => true,
        ]);

        $this->actingAs($agent);
        $res = $this->postJson('/chat/agent-offline');

        $res->assertOk()->assertJson(['available' => false]);
        $this->assertDatabaseHas('users', [
            'id' => $agent->id,
            'is_available' => false,
        ]);
    }

    // ─── REPLY — NORMAL CHAT (NO TICKET) ───────────────────────────────

    public function test_reply_greeting(): void
    {
        $res = $this->postJson('/chat/reply', ['message' => 'hi']);

        $res->assertOk();
        $this->assertStringContainsString('Welcome to DevXCloud', $res->json('reply'));
    }

    public function test_reply_exact_faq_match(): void
    {
        $this->createFaq('What is DevXCloud|Tell me about DevXCloud', 'DevXCloud is a growth system.');

        $res = $this->postJson('/chat/reply', ['message' => 'What is DevXCloud']);

        $res->assertOk();
        $this->assertEquals('DevXCloud is a growth system.', $res->json('reply'));
    }

    public function test_reply_fallback_when_no_match(): void
    {
        $this->createFaq('What is DevXCloud', 'DevXCloud is a growth system.');

        $res = $this->postJson('/chat/reply', ['message' => 'asdfghjkl12345']);

        $res->assertOk();
        $this->assertEquals(
            "I don't have enough context to answer that accurately. If your question is specific to your business, I can help you continue in one of the following ways.",
            $res->json('reply')
        );
        $this->assertNotNull($res->json('options'));
    }

    // ─── REPLY — TICKET MODE (AGENT ONLINE, NO bot_mode) ────────────────

    public function test_reply_ticket_mode_saves_message(): void
    {
        $ticket = $this->createTicket();

        $res = $this->postJson('/chat/reply', [
            'message' => 'Hello agent',
            'ticket_id' => $ticket->id,
        ]);

        $res->assertOk();
        $this->assertNull($res->json('reply'));
        $this->assertTrue($res->json('ticket_message'));
        $this->assertDatabaseHas('chat_messages', [
            'ticket_id' => $ticket->id,
            'message' => 'Hello agent',
            'sender_type' => 'user',
        ]);
    }

    // ─── REPLY — BOT MODE (RE-ENGAGE, AGENT OFFLINE) ────────────────────

    public function test_bot_mode_saves_message_to_ticket(): void
    {
        $ticket = $this->createTicket();

        $res = $this->postJson('/chat/reply', [
            'message' => 'Hello in bot mode',
            'ticket_id' => $ticket->id,
            'bot_mode' => true,
        ]);

        $res->assertOk();
        $this->assertDatabaseHas('chat_messages', [
            'ticket_id' => $ticket->id,
            'message' => 'Hello in bot mode',
            'sender_type' => 'user',
        ]);
    }

    public function test_bot_mode_returns_greeting_when_greeting(): void
    {
        $ticket = $this->createTicket();

        $res = $this->postJson('/chat/reply', [
            'message' => 'hello',
            'ticket_id' => $ticket->id,
            'bot_mode' => true,
        ]);

        $res->assertOk();
        $this->assertStringContainsString('Welcome to DevXCloud', $res->json('reply'));
    }

    public function test_bot_mode_returns_faq_match(): void
    {
        $this->createFaq('What is DevXCloud|Tell me about DevXCloud', 'DevXCloud is a growth system.');
        $ticket = $this->createTicket();

        $res = $this->postJson('/chat/reply', [
            'message' => 'Tell me about DevXCloud',
            'ticket_id' => $ticket->id,
            'bot_mode' => true,
        ]);

        $res->assertOk();
        $this->assertEquals('DevXCloud is a growth system.', $res->json('reply'));
        // Should NOT save to ChatHistory (bot mode skips history)
        $this->assertDatabaseMissing('chat_histories', [
            'question' => 'Tell me about DevXCloud',
        ]);
    }

    public function test_bot_mode_returns_fallback_when_no_faq_match(): void
    {
        $this->createFaq('What is DevXCloud', 'DevXCloud is a growth system.');
        $ticket = $this->createTicket();

        $res = $this->postJson('/chat/reply', [
            'message' => 'xyzunknownquery',
            'ticket_id' => $ticket->id,
            'bot_mode' => true,
        ]);

        $res->assertOk();
        $this->assertEquals(
            "I don't have enough context to answer that accurately. If your question is specific to your business, I can help you continue in one of the following ways.",
            $res->json('reply')
        );
        $this->assertEquals(
            ['Get Personalized Guidance', 'Book Discovery Call', 'Explore Services'],
            $res->json('options')
        );
    }

    public function test_bot_mode_returns_fallback_when_faqs_empty(): void
    {
        $ticket = $this->createTicket();

        $res = $this->postJson('/chat/reply', [
            'message' => 'anything',
            'ticket_id' => $ticket->id,
            'bot_mode' => true,
        ]);

        $res->assertOk();
        $this->assertEquals(
            "I don't have enough context to answer that accurately. If your question is specific to your business, I can help you continue in one of the following ways.",
            $res->json('reply')
        );
        $this->assertNotNull($res->json('options'));
    }

    public function test_bot_mode_with_options_in_response(): void
    {
        $this->createFaq('What is DevXCloud', 'DevXCloud is a growth system.');
        $ticket = $this->createTicket();

        $res = $this->postJson('/chat/reply', [
            'message' => 'Tell me your pricing',
            'ticket_id' => $ticket->id,
            'bot_mode' => true,
        ]);

        $res->assertOk();
        // Should include options since FAQ isn't matched, so fallback
        $this->assertNotNull($res->json('options'));
    }

    // ─── SUBMIT FORM TESTS ─────────────────────────────────────────────

    public function test_submit_form_creates_ticket_and_sends_email(): void
    {
        Mail::fake();

        $res = $this->postJson('/chat/submit-form', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'type' => 'guidance',
            'form_data' => ['business_type' => 'SaaS', 'question' => 'Help me grow'],
        ]);

        $res->assertOk();
        $res->assertJsonStructure(['success', 'ticket_number', 'ticket_id']);

        $this->assertDatabaseHas('chat_tickets', [
            'email' => 'test@example.com',
            'form_type' => 'guidance',
        ]);

        Mail::assertQueued(TicketCreated::class);
    }

    public function test_submit_form_stores_conversation(): void
    {
        $conversation = json_encode([
            ['type' => 'user', 'message' => 'hi', 'options' => []],
            ['type' => 'bot', 'message' => 'Welcome!', 'options' => []],
        ]);

        $res = $this->postJson('/chat/submit-form', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'type' => 'discovery',
            'form_data' => ['business_name' => 'Acme'],
            'conversation' => $conversation,
        ]);

        $res->assertOk();
        $ticketId = $res->json('ticket_id');

        $this->assertDatabaseHas('chat_messages', [
            'ticket_id' => $ticketId,
            'message' => 'hi',
            'sender_type' => 'user',
        ]);
        $this->assertDatabaseHas('chat_messages', [
            'ticket_id' => $ticketId,
            'message' => 'Welcome!',
            'sender_type' => 'bot',
        ]);
    }

    // ─── RE-ENGAGE ROUTE TESTS ─────────────────────────────────────────

    public function test_reengage_route_redirects_with_valid_token(): void
    {
        $ticket = $this->createTicket(['email' => 'test@example.com']);
        $token = sha1($ticket->id . 'test@example.com' . 'devxcloud-salt');

        $res = $this->get("/chat/re-engage/{$ticket->id}/{$token}");

        $res->assertRedirect('/?re=' . $ticket->id);
    }

    public function test_reengage_route_403_with_invalid_token(): void
    {
        $ticket = $this->createTicket();

        $res = $this->get("/chat/re-engage/{$ticket->id}/invalidtoken");

        $res->assertForbidden();
    }

    public function test_reengage_route_404_for_nonexistent_ticket(): void
    {
        $token = sha1('999' . 'test@example.com' . 'devxcloud-salt');
        $res = $this->get("/chat/re-engage/999/{$token}");
        $res->assertNotFound();
    }

    // ─── TICKET HISTORY / MESSAGES ─────────────────────────────────────

    public function test_ticket_history_returns_conversation(): void
    {
        $ticket = $this->createTicket();
        ChatMessage::factory()->create([
            'ticket_id' => $ticket->id,
            'sender_type' => 'user',
            'message' => 'User msg',
        ]);
        ChatMessage::factory()->create([
            'ticket_id' => $ticket->id,
            'sender_type' => 'bot',
            'message' => 'Bot response',
            'options' => ['opt1', 'opt2'],
        ]);

        $res = $this->postJson('/chat/ticket/history', [
            'ticket_id' => $ticket->id,
        ]);

        $res->assertOk();
        $this->assertCount(2, $res->json('conversation'));
        $this->assertEquals('User msg', $res->json('conversation.0.message'));
        $this->assertEquals('Bot response', $res->json('conversation.1.message'));
    }

    public function test_user_messages_returns_new_messages_since_id(): void
    {
        $ticket = $this->createTicket();
        $msg1 = ChatMessage::factory()->create([
            'ticket_id' => $ticket->id,
            'message' => 'old',
        ]);
        $msg2 = ChatMessage::factory()->create([
            'ticket_id' => $ticket->id,
            'message' => 'new',
        ]);

        $res = $this->postJson('/chat/ticket/messages', [
            'ticket_id' => $ticket->id,
            'since_id' => $msg1->id,
        ]);

        $res->assertOk();
        $this->assertCount(1, $res->json('messages'));
        $this->assertEquals('new', $res->json('messages.0.message'));
    }

    // ─── SECURITY / EDGE CASES ─────────────────────────────────────────

    public function test_reply_rejects_empty_message(): void
    {
        $res = $this->postJson('/chat/reply', ['message' => '']);
        $res->assertOk();
        $this->assertEquals('Invalid message.', $res->json('reply'));
    }

    public function test_reply_rejects_overlong_message(): void
    {
        $res = $this->postJson('/chat/reply', ['message' => str_repeat('a', 301)]);
        $res->assertOk();
        $this->assertEquals('Invalid message.', $res->json('reply'));
    }

    public function test_submit_form_validation_fails_without_required(): void
    {
        $res = $this->postJson('/chat/submit-form', []);
        $res->assertStatus(422);
    }

    // ─── PERFORMANCE: BOT_MODE RESPONSE TIME ───────────────────────────

    public function test_bot_mode_response_time_under_500ms(): void
    {
        $this->createFaq('What is DevXCloud', 'DevXCloud is a growth system.');
        $ticket = $this->createTicket();

        $start = microtime(true);
        $res = $this->postJson('/chat/reply', [
            'message' => 'What is DevXCloud',
            'ticket_id' => $ticket->id,
            'bot_mode' => true,
        ]);
        $duration = (microtime(true) - $start) * 1000;

        $res->assertOk();
        $this->assertLessThan(500, $duration, 'bot_mode response took ' . round($duration) . 'ms, expected < 500ms');
    }

    // ─── STRESS TEST: 10 RAPID BOT_MODE REQUESTS ───────────────────────

    public function test_bot_mode_stress_10_rapid_requests(): void
    {
        $faqs = [
            'What is DevXCloud|Tell me about DevXCloud' => 'DevXCloud is a growth system.',
            'What services do you offer|Your services' => 'We offer CommerceAI, LaunchPadAI, ScaleCloud, EliteScale, and GreenScale Formula.',
            'How much does it cost|Pricing|What are your rates' => 'Our pricing depends on the solution. Book a discovery call for a custom quote.',
            'How does the process work|What is your process' => 'We assess your needs, recommend a solution, implement, and optimize continuously.',
            'Do you support ecommerce|Ecommerce solutions' => 'Yes, CommerceAI is our ecommerce-specific growth solution.',
        ];

        foreach ($faqs as $q => $a) {
            $this->createFaq($q, $a);
        }

        $ticket = $this->createTicket();

        $messages = [
            'What is DevXCloud',
            'Tell me about DevXCloud',
            'What services do you offer',
            'How much does it cost',
            'How does the process work',
            'Do you support ecommerce',
            'Your services',
            'What are your rates',
            'Tell me about pricing',
            'Ecommerce solutions',
        ];

        $timings = [];

        for ($i = 0; $i < 10; $i++) {
            $start = microtime(true);
            $res = $this->postJson('/chat/reply', [
                'message' => $messages[$i],
                'ticket_id' => $ticket->id,
                'bot_mode' => true,
            ]);
            $duration = (microtime(true) - $start) * 1000;
            $timings[] = round($duration, 1);

            $res->assertOk();
            $this->assertNotNull($res->json('reply'), "Request #$i returned null reply");
            $this->assertNotEmpty(trim($res->json('reply')), "Request #$i returned empty reply");
        }

        $max = max($timings);
        $avg = array_sum($timings) / count($timings);

        $this->assertLessThan(500, $max, "Slowest request was {$max}ms, expected < 500ms");
        $this->assertLessThan(200, $avg, "Average was {$avg}ms, expected < 200ms");
    }
}
