<?php

namespace App\Livewire\Agent;

use Livewire\Component;
use App\Models\ChatTicket;
use App\Models\ChatMessage;
// use App\Mail\AgentReplied;
use App\Mail\TicketClaimed;
use App\Mail\TicketClosed;
use App\Mail\TicketReminder;
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
    public $showForceConfirm = false;

    protected $listeners = ['ticketSelected' => 'selectTicket'];

    public function mount()
    {
        $this->loadTickets();
    }

    public function loadTickets()
    {
        $user = auth()->user();
        if (!$user) return;

        $user->update([
            'is_available' => true,
            'last_active_at' => now(),
        ]);

        $this->tickets = ChatTicket::where(function ($q) {
                $q->whereIn('status', ['pending', 'open', 'in_progress'])
                  ->orWhere('status', 'closed');
            })
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
            ->first()
            ?->toArray();

        if (!$this->selectedTicket) {
            $this->selectedTicketId = null;
            return;
        }

        $status = $this->selectedTicket['status'] ?? 'closed';
        $this->dispatch('input-visibility', status: $status);

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

        $this->dispatch('scroll-down');
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

        try {
            Mail::to($ticket->email)->queue(new TicketClaimed($ticket, $user));
        } catch (\Exception $e) {
            Log::error('Ticket claimed email from Livewire failed: ' . $e->getMessage());
        }

        $this->loadTickets();
        $this->selectTicket($ticket->id);
    }

    public function sendMessage($message = null)
    {
        if ($message !== null) {
            $this->newMessage = $message;
        }
        $this->validate(['newMessage' => 'required|string|max:5000']);

        $user = auth()->user();
        $ticketId = (int) $this->selectedTicketId;
        $ticket = ChatTicket::where('id', $ticketId)
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

        // try {
        //     Mail::to($ticket->email)->queue(new AgentReplied($ticket, $msg));
        // } catch (\Exception $e) {
        //     Log::error('Agent replied email from Livewire failed: ' . $e->getMessage());
        // }

        $this->newMessage = '';
        $this->refreshMessages();
        $this->loadTickets();
    }

    public function requestClose()
    {
        $user = auth()->user();
        $ticket = ChatTicket::where('id', $this->selectedTicketId)
            ->where('assigned_to', $user->id)
            ->first();

        if (!$ticket) return;

        ChatMessage::create([
            'ticket_id' => $ticket->id,
            'sender_type' => 'system',
            'message' => 'Based on our conversation, it looks like your needs have been taken care of. If you\'re satisfied, please close this ticket. Feel free to reach out anytime you need help again.',
            'options' => ['Close this Ticket', 'Open New Ticket'],
            'created_at' => now(),
        ]);

        $ticket->update([
            'last_activity_at' => now(),
            'close_requested_at' => now(),
        ]);
        $this->refreshMessages();
    }

    public function sendReminder()
    {
        $user = auth()->user();
        $ticket = ChatTicket::where('id', $this->selectedTicketId)
            ->where('assigned_to', $user->id)
            ->first();

        if (!$ticket) return;

        ChatMessage::create([
            'ticket_id' => $ticket->id,
            'sender_id' => $user->id,
            'sender_type' => 'system',
            'message' => 'Reminder: ' . $user->name . ' is waiting for your response. Please reply to continue.',
            'options' => ['I\'m still here', 'Close this Ticket'],
            'created_at' => now(),
        ]);

        $ticket->update([
            'last_activity_at' => now(),
            'reminder_sent_at' => now(),
        ]);

        try {
            Mail::to($ticket->email)->queue(new TicketReminder($ticket, $user));
        } catch (\Exception $e) {
            Log::error('Ticket reminder email failed: ' . $e->getMessage());
        }

        $this->refreshMessages();
    }

    public function confirmForceClose()
    {
        $this->showForceConfirm = true;
    }

    public function cancelForceClose()
    {
        $this->showForceConfirm = false;
    }

    public function forceClose()
    {
        $this->showForceConfirm = false;

        $user = auth()->user();
        $ticketId = (int) $this->selectedTicketId;
        $ticket = ChatTicket::where('id', $ticketId)
            ->where('assigned_to', $user->id)
            ->first();

        if (!$ticket) return;

        $ticket->close();

        ChatMessage::create([
            'ticket_id' => $ticket->id,
            'sender_id' => $user->id,
            'sender_type' => 'system',
            'message' => 'This ticket has been closed by ' . $user->name . '.',
            'created_at' => now(),
        ]);

        try {
            Mail::to($ticket->email)->queue(new TicketClosed($ticket, $user));
        } catch (\Exception $e) {
            Log::error('Ticket closed email from Livewire failed: ' . $e->getMessage());
        }

        try {
            $adminEmails = config('admin.emails', []);
            foreach ($adminEmails as $adminEmail) {
                Mail::to($adminEmail)->queue(new TicketClosed($ticket, $user, true));
            }
            // if ($ticket->assigned_to && $ticket->assigned_to !== $user->id) {
            //     $assignedAgent = User::find($ticket->assigned_to);
            //     if ($assignedAgent) {
            //         Mail::to($assignedAgent->email)->queue(new TicketClosed($ticket, $user, true));
            //     }
            // }
        } catch (\Exception $e) {
            Log::error('Ticket closed admin email from Livewire failed: ' . $e->getMessage());
        }

        $this->dispatch('input-visibility', status: 'closed');
        $this->selectedTicketId = null;
        $this->selectedTicket = null;
        $this->messages = [];
        $this->loadTickets();
    }

    public function render()
    {
        $this->loadTickets();

        if ($this->selectedTicketId) {
            $this->selectedTicket = ChatTicket::with('agent')
                ->where('id', $this->selectedTicketId)
                ->first()
                ?->toArray();

            if (!$this->selectedTicket) {
                $this->selectedTicketId = null;
                $this->userTyping = false;
            } else {
                $this->messages = ChatMessage::where('ticket_id', $this->selectedTicketId)
                    ->with('sender')
                    ->orderBy('created_at')
                    ->orderBy('id')
                    ->get()
                    ->toArray();

                if ($this->selectedTicket['status'] !== 'closed') {
                    $ck = 'msg_count_' . $this->selectedTicketId;
                    $cnt = count($this->messages);
                    $prev = (int) cache()->get($ck, 0);
                    if ($cnt > $prev) {
                        $this->dispatch('scroll-down');
                    }
                    cache()->put($ck, $cnt, now()->addHours(1));
                }

                $typing = cache()->get('ticket_typing_' . $this->selectedTicketId);
                $this->userTyping = ($typing === 'user');

                $this->dispatch('input-visibility', status: $this->selectedTicket['status']);
            }
        } else {
            $this->userTyping = false;
        }

        return view('livewire.agent.dashboard');
    }
}
