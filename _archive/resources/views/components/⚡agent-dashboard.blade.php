<?php

use App\Models\ChatHistory;
use App\Models\User;
use App\Mail\QuestionAnswered;
use App\Events\AgentMessageSent;
use App\Events\AgentTyping;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

new class extends Component {
    public $filter = 'pending';
    public $search = '';
    public $chatMessages = [];
    public $chatHistoryId = null;
    public $activeChat = null;
    public $messageText = '';
    public $agentTyping = false;
    public $customerTyping = false;

    public function mount($chatId = null)
    {
        if ($chatId) {
            $this->openChat($chatId);
        }
    }

    public function getQuestionsProperty()
    {
        $query = ChatHistory::with('user');

        if ($this->filter === 'pending') {
            $query->where('source', 'pending')->whereNull('answered_by');
        } elseif ($this->filter === 'active') {
            $query->where('source', 'pending')->whereNotNull('answered_by');
        } elseif ($this->filter === 'resolved') {
            $query->where('source', 'admin');
        } elseif ($this->filter === 'lead') {
            $query->where('source', 'lead');
        }

        if ($this->search) {
            $query->where('question', 'like', '%' . $this->search . '%');
        }

        return $query->orderBy('asked_at', 'desc')->limit(50)->get();
    }

    public function setFilter($filter)
    {
        $this->filter = $filter;
    }

    public function claimQuestion($id)
    {
        $question = ChatHistory::findOrFail($id);
        if ($question->source !== 'pending' || $question->answered_by) {
            $this->dispatch('toast', 'This question is already claimed.');
            return;
        }

        $question->update([
            'answered_by' => auth()->id(),
            'agent_assigned_at' => now(),
            'status' => 'agent_active',
        ]);

        $this->dispatch('toast', 'Question claimed. You can now reply.');
    }

    public function openChat($id)
    {
        $question = ChatHistory::with('user')->findOrFail($id);
        $this->activeChat = $question;
        $this->chatHistoryId = $question->id;
        $this->chatMessages = [];

        if ($question->answer && $question->source === 'admin') {
            $this->chatMessages[] = [
                'type' => 'agent',
                'text' => $question->answer,
                'time' => $question->answered_at ? $question->answered_at->format('h:i A') : '',
            ];
        }
    }

    public function closeChat()
    {
        $this->activeChat = null;
        $this->chatMessages = [];
        $this->messageText = '';
        $this->dispatch('chat-closed');
    }

    public function sendMessage()
    {
        if (!trim($this->messageText) || !$this->activeChat) return;

        $activeChat = $this->activeChat;
        $userId = $activeChat->user_id;
        $sessionId = $activeChat->session_id;

        $text = trim($this->messageText);

        $activeChat->update([
            'answer' => $text,
            'source' => 'admin',
            'answered_by' => auth()->id(),
            'answered_at' => now(),
        ]);

        $this->chatMessages[] = [
            'type' => 'agent',
            'text' => $text,
            'time' => now()->format('h:i A'),
        ];

        broadcast(new AgentMessageSent($text, $sessionId, $userId, $activeChat->id))->toOthers();

        if ($activeChat->user && $activeChat->user->email) {
            Mail::to($activeChat->user->email)->send(new QuestionAnswered($activeChat));
        }

        $this->messageText = '';
        $this->dispatch('chat-updated');
    }

    public function updatedMessageText()
    {
        if ($this->activeChat) {
            broadcast(new AgentTyping(
                $this->activeChat->session_id,
                $this->activeChat->user_id,
                strlen($this->messageText) > 0
            ))->toOthers();
        }
    }

    public function getListeners()
    {
        return [
            'echo-agent-questions,.new.pending.question' => 'refreshQuestions',
        ];
    }

    public function refreshQuestions()
    {
        // Component will re-render automatically via Livewire
    }
};
?>

<div class="agent-dashboard" x-data="agentDashboard()" x-init="initEcho()">
    <div class="dashboard-layout">
        <div class="questions-panel">
            <div class="panel-header">
                <h3>Support Queue</h3>
                <div class="filter-tabs">
                    <button wire:click="setFilter('pending')" class="{{ $filter === 'pending' ? 'active' : '' }}">Pending</button>
                    <button wire:click="setFilter('active')" class="{{ $filter === 'active' ? 'active' : '' }}">Active</button>
                    <button wire:click="setFilter('resolved')" class="{{ $filter === 'resolved' ? 'active' : '' }}">Resolved</button>
                    <button wire:click="setFilter('lead')" class="{{ $filter === 'lead' ? 'active' : '' }}">Leads</button>
                </div>
                <input wire:model.live.debounce.300ms="search" type="text" class="search-input" placeholder="Search questions...">
            </div>

            <div class="questions-list">
                @forelse($this->questions as $q)
                    <div class="question-item {{ $activeChat?->id === $q->id ? 'active' : '' }}"
                         wire:click="openChat({{ $q->id }})">
                        <div class="question-header">
                            <span class="user-name">{{ $q->user?->name ?? 'Guest' }}</span>
                            <span class="time">{{ $q->asked_at->diffForHumans() }}</span>
                        </div>
                        <p class="question-text">{{ Str::limit($q->question, 80) }}</p>
                        <div class="question-meta">
                            @if($q->answered_by)
                                <span class="badge claimed">Claimed</span>
                            @else
                                <span class="badge unclaimed">Unclaimed</span>
                            @endif
                            <button wire:click.stop="claimQuestion({{ $q->id }})" class="claim-btn"
                                    @if($q->answered_by) disabled @endif>
                                Claim
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">No {{ $filter }} questions</div>
                @endforelse
            </div>
        </div>

        <div class="chat-panel" x-show="$wire.activeChat" x-cloak>
            @if($activeChat)
                <div class="chat-panel-header">
                    <div>
                        <strong>{{ $activeChat->user?->name ?? 'Guest' }}</strong>
                        <small>{{ $activeChat->user?->email ?? 'No email' }}</small>
                    </div>
                    <button wire:click="closeChat" class="close-btn">✕</button>
                </div>

                <div class="chat-panel-body" id="agentChatBody">
                    <div class="customer-message">
                        <div class="msg-icon user-icon">👤</div>
                        <div class="msg-content">
                            <div class="msg-text">{{ $activeChat->question }}</div>
                            <div class="msg-time">{{ $activeChat->asked_at->format('h:i A') }}</div>
                        </div>
                    </div>

                    @foreach($chatMessages as $msg)
                        <div class="agent-message">
                            <div class="msg-content">
                                <div class="msg-text">{{ $msg['text'] }}</div>
                                <div class="msg-time">{{ $msg['time'] }}</div>
                            </div>
                            <div class="msg-icon agent-icon">A</div>
                        </div>
                    @endforeach

                    <div class="typing-indicator" x-show="customerTyping" x-cloak>
                        <span></span><span></span><span></span>
                    </div>
                </div>

                <div class="chat-panel-footer">
                    <div class="input-group">
                        <input wire:model="messageText" wire:keydown.enter="sendMessage"
                               wire:input="updatedMessageText"
                               type="text" class="chat-input" placeholder="Type your response...">
                        <button wire:click="sendMessage" class="send-msg-btn">Send</button>
                    </div>
                </div>
            @else
                <div class="no-chat-selected">
                    <p>Select a question from the queue to start responding</p>
                </div>
            @endif
        </div>
    </div>

    <style>
        .agent-dashboard { font-family: system-ui, sans-serif; height: calc(100vh - 120px); }
        .dashboard-layout { display: flex; height: 100%; gap: 16px; }
        .questions-panel { width: 380px; min-width: 380px; background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); display: flex; flex-direction: column; overflow: hidden; }
        .panel-header { padding: 16px; border-bottom: 1px solid #eee; }
        .panel-header h3 { margin: 0 0 12px 0; font-size: 18px; }
        .filter-tabs { display: flex; gap: 4px; margin-bottom: 12px; }
        .filter-tabs button { padding: 6px 12px; border: 1px solid #ddd; border-radius: 6px; background: #fff; cursor: pointer; font-size: 12px; }
        .filter-tabs button.active { background: #0176d3; color: #fff; border-color: #0176d3; }
        .search-input { width: 100%; padding: 8px 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 13px; }
        .questions-list { flex: 1; overflow-y: auto; }
        .question-item { padding: 12px 16px; border-bottom: 1px solid #f0f0f0; cursor: pointer; transition: 0.15s; }
        .question-item:hover { background: #f5f8ff; }
        .question-item.active { background: #e8f0fe; border-left: 3px solid #0176d3; }
        .question-header { display: flex; justify-content: space-between; margin-bottom: 4px; }
        .user-name { font-weight: 600; font-size: 13px; }
        .time { font-size: 11px; color: #888; }
        .question-text { font-size: 13px; color: #444; margin: 4px 0 8px; }
        .question-meta { display: flex; align-items: center; gap: 8px; }
        .badge { font-size: 10px; padding: 2px 8px; border-radius: 10px; }
        .badge.claimed { background: #fff3cd; color: #856404; }
        .badge.unclaimed { background: #d4edda; color: #155724; }
        .claim-btn { padding: 3px 12px; font-size: 11px; border: 1px solid #0176d3; border-radius: 6px; background: #fff; color: #0176d3; cursor: pointer; }
        .claim-btn:disabled { opacity: 0.4; cursor: not-allowed; }
        .claim-btn:hover:not(:disabled) { background: #0176d3; color: #fff; }
        .empty-state { padding: 40px; text-align: center; color: #999; }

        .chat-panel { flex: 1; background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); display: flex; flex-direction: column; overflow: hidden; }
        .chat-panel-header { padding: 12px 16px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center; }
        .chat-panel-header strong { display: block; font-size: 14px; }
        .chat-panel-header small { color: #888; font-size: 12px; }
        .close-btn { background: none; border: none; font-size: 20px; cursor: pointer; color: #888; }
        .chat-panel-body { flex: 1; padding: 16px; overflow-y: auto; }
        .no-chat-selected { flex: 1; display: flex; align-items: center; justify-content: center; color: #999; }
        .customer-message, .agent-message { display: flex; align-items: flex-start; margin-bottom: 16px; gap: 10px; }
        .agent-message { justify-content: flex-end; }
        .msg-icon { width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 14px; flex-shrink: 0; }
        .user-icon { background: #f0f0f0; }
        .agent-icon { background: #0176d3; color: #fff; font-weight: 700; font-size: 12px; }
        .msg-content { max-width: 70%; }
        .msg-text { padding: 10px 14px; border-radius: 14px; font-size: 14px; line-height: 1.5; }
        .customer-message .msg-text { background: #f0f0f0; border-bottom-left-radius: 4px; }
        .agent-message .msg-text { background: #0176d3; color: #fff; border-bottom-right-radius: 4px; }
        .msg-time { font-size: 11px; color: #999; margin-top: 4px; }
        .agent-message .msg-time { text-align: right; }

        .chat-panel-footer { padding: 12px; border-top: 1px solid #eee; }
        .input-group { display: flex; gap: 8px; }
        .chat-input { flex: 1; padding: 10px 14px; border: 1px solid #ddd; border-radius: 24px; font-size: 14px; outline: none; }
        .chat-input:focus { border-color: #0176d3; }
        .send-msg-btn { padding: 10px 20px; background: #0176d3; color: #fff; border: none; border-radius: 24px; cursor: pointer; font-size: 13px; font-weight: 600; }
        .send-msg-btn:hover { background: #015ea8; }

        .typing-indicator { display: flex; gap: 4px; padding: 8px 12px; align-items: center; }
        .typing-indicator span { width: 6px; height: 6px; background: #999; border-radius: 50%; animation: bounce 1.2s infinite ease-in-out; }
        .typing-indicator span:nth-child(2) { animation-delay: 0.2s; }
        .typing-indicator span:nth-child(3) { animation-delay: 0.4s; }
        @keyframes bounce { 0%,80%,100% { transform: scale(0.6); opacity: 0.3; } 40% { transform: scale(1); opacity: 1; } }
    </style>

    <script>
        function agentDashboard() {
            return {
                customerTyping: false,
                _typingChannel: null,
                initEcho() {
                    if (typeof window.Echo === 'undefined') return;
                    this.$watch('$wire.activeChat', (val) => {
                        if (val?.conversation_id) {
                            this.listenToCustomerTyping(val.conversation_id);
                        } else {
                            this.cleanupTypingChannel();
                        }
                    });
                    if (this.$wire.activeChat?.conversation_id) {
                        this.listenToCustomerTyping(this.$wire.activeChat.conversation_id);
                    }
                },
                listenToCustomerTyping(convId) {
                    this.cleanupTypingChannel();
                    this._typingChannel = window.Echo.channel('agent.conversation.' + convId);
                    this._typingChannel.listen('.customer.typing', (e) => {
                        this.customerTyping = e.isTyping;
                    });
                },
                cleanupTypingChannel() {
                    if (this._typingChannel) {
                        window.Echo.leaveChannel(this._typingChannel.name);
                        this._typingChannel = null;
                    }
                    this.customerTyping = false;
                }
            }
        }
    </script>
</div>
