<?php

namespace App\Livewire\Agent;

use Livewire\Component;
use App\Models\ChatTicket;
use App\Models\ChatMessage;
use App\Mail\AgentReplied;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class Dashboard extends Component
{
    public $selectedTicketId;
    public $newMessage = '';
    public $tickets = [];
    public $messages = [];
    public $selectedTicket;
    public $userTyping = false;

    protected $listeners = ['ticketSelected' => 'selectTicket'];

    public function mount()
    {
        $this->loadTickets();
    }

    public function loadTickets()
    {
        $user = auth()->user();
        $user->update(['last_active_at' => now()]);

        $this->tickets = ChatTicket::whereIn('status', ['pending', 'open', 'in_progress'])
            ->when($user->role !== 'admin', function ($q) use ($user) {
                $q->where(function ($q) use ($user) {
                    $q->whereNull('assigned_to')
                      ->orWhere('assigned_to', $user->id);
                });
            })
            ->with('agent')
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();
    }

    public function selectTicket($ticketId)
    {
        $this->selectedTicketId = $ticketId;
        $user = auth()->user();

        $this->selectedTicket = ChatTicket::with('agent')
            ->where('id', $ticketId)
            ->first();

        if (!$this->selectedTicket) {
            $this->selectedTicketId = null;
            return;
        }

        $this->refreshMessages();
    }

    public function refreshMessages()
    {
        if (!$this->selectedTicketId) return;

        $this->messages = ChatMessage::where('ticket_id', $this->selectedTicketId)
            ->with('sender')
            ->orderBy('created_at')
            ->get()
            ->toArray();
    }

    public function checkTyping()
    {
        if (!$this->selectedTicketId) {
            $this->userTyping = false;
            return;
        }
        $typing = cache()->get('ticket_typing_' . $this->selectedTicketId);
        $this->userTyping = ($typing === 'user');
    }

    public function agentTyping()
    {
        if (!$this->selectedTicketId) return;
        cache()->put(
            'ticket_typing_' . $this->selectedTicketId,
            'agent',
            now()->addSeconds(7)
        );
    }

    public function claimTicket($ticketId)
    {
        $user = auth()->user();
        $ticket = ChatTicket::where('id', $ticketId)
            ->whereIn('status', ['pending', 'open'])
            ->first();

        if (!$ticket) return;

        $ticket->update([
            'assigned_to' => $user->id,
            'status' => 'in_progress',
            'last_activity_at' => now(),
        ]);

        ChatMessage::create([
            'ticket_id' => $ticket->id,
            'sender_id' => $user->id,
            'sender_type' => 'agent',
            'message' => 'Agent ' . $user->name . ' has joined the conversation.',
            'created_at' => now(),
        ]);

        $this->loadTickets();
        $this->selectTicket($ticket->id);
    }

    public function sendMessage()
    {
        $this->validate(['newMessage' => 'required|string|max:5000']);

        $user = auth()->user();
        $ticket = ChatTicket::where('id', $this->selectedTicketId)
            ->where('assigned_to', $user->id)
            ->first();

        if (!$ticket) return;

        $msg = ChatMessage::create([
            'ticket_id' => $ticket->id,
            'sender_id' => $user->id,
            'sender_type' => 'agent',
            'message' => $this->newMessage,
            'created_at' => now(),
        ]);

        $ticket->update(['last_activity_at' => now()]);

        try {
            Mail::to($ticket->email)->send(new AgentReplied($ticket, $msg));
        } catch (\Exception $e) {
            Log::error('Agent replied email from Livewire failed: ' . $e->getMessage());
        }

        $this->messages[] = $msg->load('sender')->toArray();
        $this->newMessage = '';
        $this->loadTickets();
    }

    public function render()
    {
        return view('livewire.agent.dashboard');
    }
}
