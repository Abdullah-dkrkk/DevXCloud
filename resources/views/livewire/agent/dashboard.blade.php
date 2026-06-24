<div class="flex h-full gap-4 overflow-hidden" x-data="{ activeTab: 'open' }">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col" style="width: 40%; min-width: 400px;">
        <style>
            .agent-ticket-list::-webkit-scrollbar { width: 5px; }
            .agent-ticket-list::-webkit-scrollbar-track { background: transparent; }
            .agent-ticket-list::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 999px; }
            .agent-ticket-list::-webkit-scrollbar-thumb:hover { background: #9ca3af; }
        </style>
        <div class="p-4 border-b bg-gray-50 flex items-center justify-between">
            <span class="text-sm font-semibold text-gray-700">Tickets</span>
            <div class="flex gap-1.5">
                <button @click="activeTab = 'open'"
                        :class="activeTab === 'open' ? 'bg-blue-600 text-white shadow-sm' : 'bg-gray-200 text-gray-600 hover:bg-gray-300'"
                        class="px-3.5 py-1.5 rounded-lg text-xs font-medium transition">Open</button>
                <button @click="activeTab = 'mine'"
                        :class="activeTab === 'mine' ? 'bg-blue-600 text-white shadow-sm' : 'bg-gray-200 text-gray-600 hover:bg-gray-300'"
                        class="px-3.5 py-1.5 rounded-lg text-xs font-medium transition">Mine</button>
            </div>
        </div>
        <div class="flex-1 overflow-y-auto agent-ticket-list" wire:poll.5s="loadTickets">
            <template x-for="ticket in $wire.tickets.filter(t => activeTab === 'open' ? !t.assigned_to : t.assigned_to === {{ auth()->id() }})" :key="ticket.id">
                <div @click="$wire.selectTicket(ticket.id)"
                     :class="{
                         'bg-blue-50 border-blue-400': ticket.id === $wire.selectedTicketId,
                         'hover:bg-gray-50 border-transparent': ticket.id !== $wire.selectedTicketId
                     }"
                     class="p-4 border-l-4 cursor-pointer transition">
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-white text-sm font-bold flex-shrink-0 mt-0.5"
                             :style="'background: ' + ['#0176D3','#2E7D32','#E65100','#6A1B9A','#C62828','#00695C','#F57F17','#4E342E'][ticket.name.length % 8]">
                            <span x-text="ticket.name.charAt(0).toUpperCase()"></span>
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="flex justify-between items-start gap-1">
                                <span class="font-medium text-sm text-gray-800 truncate" x-text="ticket.name"></span>
                                <span class="text-xs text-gray-400 whitespace-nowrap flex-shrink-0" x-text="timeAgo(ticket.created_at)"></span>
                            </div>
                            <div class="text-xs text-gray-400 truncate mt-0.5" x-text="ticket.email"></div>
                            <div class="flex items-center gap-1.5 mt-2 flex-wrap">
                                <span class="text-xs px-2 py-0.5 rounded font-medium"
                                      :class="{
                                          'bg-yellow-100 text-yellow-800': ticket.status === 'pending',
                                          'bg-blue-100 text-blue-800': ticket.status === 'open',
                                          'bg-green-100 text-green-800': ticket.status === 'in_progress'
                                      }" x-text="ticket.status.replace('_', ' ')"></span>
                                <span class="text-xs px-2 py-0.5 rounded bg-purple-50 text-purple-700 font-medium"
                                      x-text="ticket.form_type === 'guidance' ? 'Personalized Guidance' : 'Growth Discovery Call'"></span>
                                <span x-show="ticket.agent" class="text-xs text-gray-400 flex items-center gap-0.5">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    <span x-text="ticket.agent?.name"></span>
                                </span>
                            </div>
                            <button x-show="!ticket.assigned_to && activeTab === 'open'"
                                    @click.stop="$wire.claimTicket(ticket.id)"
                                    class="mt-2.5 text-xs bg-green-600 text-white px-3 py-1 rounded-lg hover:bg-green-700 transition font-medium">
                                + Claim
                            </button>
                        </div>
                    </div>
                </div>
            </template>
            <div x-show="$wire.tickets.filter(t => activeTab === 'open' ? !t.assigned_to : t.assigned_to === {{ auth()->id() }}).length === 0"
                 class="p-8 text-center">
                <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                <p class="text-gray-400 text-sm" x-text="activeTab === 'open' ? 'No open tickets' : 'No tickets assigned to you'"></p>
            </div>
        </div>
    </div>

    <div wire:poll.3s="refreshMessages" class="hidden"></div>

    <div class="flex-1 min-w-0 bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col">
        <template x-if="$wire.selectedTicketId">
            <div class="flex flex-col h-full">
                <div class="p-3.5 border-b bg-gray-50 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center text-white text-sm font-bold flex-shrink-0"
                         :style="'background: ' + ['#0176D3','#2E7D32','#E65100','#6A1B9A','#C62828','#00695C','#F57F17','#4E342E'][($wire.selectedTicket?.name?.length || 0) % 8]">
                        <span x-text="($wire.selectedTicket?.name || '?').charAt(0).toUpperCase()"></span>
                    </div>
                    <div class="min-w-0 flex-1">
                        <div class="flex items-center gap-2">
                            <span class="font-medium text-sm text-gray-800" x-text="$wire.selectedTicket?.name"></span>
                            <span class="text-xs px-2 py-0.5 rounded font-medium"
                                  :class="{
                                      'bg-yellow-100 text-yellow-800': $wire.selectedTicket?.status === 'pending',
                                      'bg-blue-100 text-blue-800': $wire.selectedTicket?.status === 'open',
                                      'bg-green-100 text-green-800': $wire.selectedTicket?.status === 'in_progress'
                                  }" x-text="$wire.selectedTicket?.status?.replace('_', ' ')"></span>
                        </div>
                        <div class="text-xs text-gray-500 flex items-center gap-2 mt-0.5">
                            <span x-text="$wire.selectedTicket?.email"></span>
                            <span class="text-gray-300">|</span>
                            <span class="font-mono text-gray-400" x-text="$wire.selectedTicket?.ticket_number"></span>
                        </div>
                    </div>
                </div>

                <div class="flex-1 overflow-y-auto p-4 flex flex-col" x-ref="messagesContainer">
                    <template x-for="msg in $wire.messages" :key="msg.id">
                        <template x-if="msg.sender_type === 'system'">
                            <div class="flex justify-center my-2">
                                <div class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-center max-w-[80%]">
                                    <div class="flex items-center justify-center gap-1.5 mb-1">
                                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        <span class="text-xs font-medium text-gray-500">System</span>
                                    </div>
                                    <p class="text-sm text-gray-700" x-text="msg.message"></p>
                                    <div x-show="msg.options && msg.options.length > 0" class="flex flex-wrap gap-1.5 mt-2 justify-center">
                                        <template x-for="opt in msg.options" :key="opt">
                                            <span class="text-xs px-3 py-1 rounded-full border border-gray-300 text-gray-500 bg-white font-medium">
                                                <span x-text="opt"></span>
                                            </span>
                                        </template>
                                    </div>
                                    <span class="text-xs text-gray-400 mt-1.5 block" x-text="new Date(msg.created_at).toLocaleTimeString([], {hour:'2-digit',minute:'2-digit'})"></span>
                                </div>
                            </div>
                        </template>
                        <template x-if="msg.sender_type !== 'system'">
                            <div :class="msg.sender_type === 'agent' ? 'self-end flex-row-reverse' : 'self-start'"
                                 class="flex items-end gap-2 max-w-[85%] mb-2.5">
                                <template x-if="msg.sender_type === 'bot'">
                                    <div class="w-[34px] h-[34px] rounded-full flex items-center justify-center flex-shrink-0 bg-gray-100 text-gray-500">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v2"/><rect x="4" y="6" width="16" height="12" rx="2"/><circle cx="9" cy="11" r="1"/><circle cx="15" cy="11" r="1"/><path d="M9 16c1.5.7 3 .7 4.5 0"/></svg>
                                    </div>
                                </template>
                                <template x-if="msg.sender_type !== 'bot'">
                                    <div :class="msg.sender_type === 'agent' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-500'"
                                         class="w-[34px] h-[34px] rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    </div>
                                </template>
                                <div :class="msg.sender_type === 'agent' ? 'bg-[#0176D3] text-white rounded-t-2xl rounded-bl-2xl break-words' : 'bg-gray-50 text-gray-800 rounded-t-2xl rounded-br-2xl shadow-sm border border-gray-200 break-words'"
                                     class="px-3.5 py-2.5 text-sm leading-relaxed max-w-[calc(100%-42px)] overflow-hidden">
                                    <div x-text="msg.message"></div>
                                    <div :class="msg.sender_type === 'agent' ? 'text-blue-200' : 'text-gray-400'"
                                         class="text-[10px] mt-1 text-right opacity-80">
                                        <span x-text="new Date(msg.created_at).toLocaleTimeString([], {hour:'2-digit',minute:'2-digit'})"></span>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </template>
                    <div x-show="$wire.userTyping" class="self-start flex items-end gap-2 max-w-[85%] mb-2.5">
                        <div class="w-[34px] h-[34px] rounded-full flex items-center justify-center bg-white border border-gray-200 flex-shrink-0">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <div class="bg-gray-50 rounded-t-2xl rounded-br-2xl shadow-sm border border-gray-200 px-3.5 py-3">
                            <div class="flex items-center gap-1.5">
                                <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay:0s"></span>
                                <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay:0.15s"></span>
                                <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay:0.3s"></span>
                                <span class="text-xs text-gray-400 ml-1">typing...</span>
                            </div>
                        </div>
                    </div>
                    <div x-init="$nextTick(() => { $refs.messagesContainer.scrollTop = $refs.messagesContainer.scrollHeight; })"></div>
                </div>

                <div x-show="$wire.showForceConfirm" class="px-4 py-4">
                    <div class="bg-red-50 border border-red-200 rounded-lg p-3 flex items-center justify-between gap-3">
                        <div class="flex items-center gap-2 min-w-0">
                            <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                            <span class="text-sm text-red-700">Are you sure you want to force close this ticket?</span>
                        </div>
                        <div class="flex gap-2 flex-shrink-0">
                            <button @click="$wire.cancelForceClose()"
                                    class="text-xs px-3 py-1.5 rounded-lg bg-white border border-gray-300 text-gray-600 hover:bg-gray-50 transition font-medium">Cancel</button>
                            <button @click="$wire.forceClose()"
                                    class="text-xs px-3 py-1.5 rounded-lg bg-red-600 text-white hover:bg-red-700 transition font-medium">Yes, Close</button>
                        </div>
                    </div>
                </div>

                <div class="px-4 py-2.5 border-t bg-gray-50">
                    <div class="flex gap-2">
                        <button @click="$wire.sendReminder()"
                                class="flex items-center gap-1.5 text-xs px-3 py-1.5 rounded-lg bg-amber-50 text-amber-700 border border-amber-200 hover:bg-amber-100 transition font-medium">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                            Remind
                        </button>
                        <button @click="$wire.requestClose()"
                                class="flex items-center gap-1.5 text-xs px-3 py-1.5 rounded-lg bg-green-50 text-green-700 border border-green-200 hover:bg-green-100 transition font-medium">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Close with Buttons
                        </button>
                        <button @click="$wire.confirmForceClose()"
                                class="flex items-center gap-1.5 text-xs px-3 py-1.5 rounded-lg bg-red-50 text-red-700 border border-red-200 hover:bg-red-100 transition font-medium">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            Force Close
                        </button>
                    </div>
                </div>

                <div class="p-3.5 border-t">
                    <form @submit.prevent="$wire.sendMessage()" class="flex gap-2.5">
                        <input type="text" x-model="$wire.newMessage"
                               @keydown.debounce.500ms="$wire.agentTyping()"
                               class="flex-1 border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="Type your response...">
                        <button type="submit"
                                class="bg-blue-600 text-white px-5 py-2.5 rounded-lg text-sm font-medium hover:bg-blue-700 transition shadow-sm">Send</button>
                    </form>
                </div>
            </div>
        </template>
        <template x-if="!$wire.selectedTicketId">
            <div class="flex-1 flex items-center justify-center">
                <div class="text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    <p class="text-gray-400 text-sm">Select a ticket to start chatting</p>
                </div>
            </div>
        </template>
    </div>

    <div wire:poll.3s="checkTyping" class="hidden"></div>
</div>

@push('scripts')
<script>
    function timeAgo(dateStr) {
        if (!dateStr) return '';
        var now = new Date();
        var date = new Date(dateStr);
        var diff = Math.floor((now - date) / 1000);
        if (diff < 60) return 'just now';
        if (diff < 3600) return Math.floor(diff / 60) + 'm ago';
        if (diff < 86400) return Math.floor(diff / 3600) + 'h ago';
        if (diff < 2592000) return Math.floor(diff / 86400) + 'd ago';
        return date.toLocaleDateString();
    }
</script>
@endpush