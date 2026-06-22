<div class="flex h-[calc(100vh-8rem)] gap-4 p-4" x-data="{ activeTab: 'open' }">
    <div class="w-96 bg-white rounded-lg shadow overflow-hidden flex flex-col">
        <div class="p-3 border-b bg-gray-50 flex gap-2">
            <button @click="activeTab = 'open'"
                    :class="activeTab === 'open' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'"
                    class="px-3 py-1.5 rounded text-sm font-medium transition">
                Open
            </button>
            <button @click="activeTab = 'mine'"
                    :class="activeTab === 'mine' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'"
                    class="px-3 py-1.5 rounded text-sm font-medium transition">
                Mine
            </button>
        </div>
        <div class="flex-1 overflow-y-auto" wire:poll.5s="loadTickets">
            <template x-for="ticket in $wire.tickets.filter(t => activeTab === 'open' ? !t.assigned_to : t.assigned_to === {{ auth()->id() }})" :key="ticket.id">
                <div @click="$wire.selectTicket(ticket.id)"
                     :class="{'bg-blue-50 border-blue-300': ticket.id === $wire.selectedTicketId, 'border-transparent': ticket.id !== $wire.selectedTicketId}"
                     class="p-3 border-l-4 cursor-pointer hover:bg-gray-50 transition">
                    <div class="flex justify-between items-start">
                        <span class="font-medium text-sm text-gray-800" x-text="ticket.name"></span>
                        <span class="text-xs text-gray-400" x-text="new Date(ticket.created_at).toLocaleDateString()"></span>
                    </div>
                    <div class="text-xs text-gray-500 mt-0.5" x-text="ticket.email"></div>
                    <div class="flex items-center gap-2 mt-1.5">
                        <span class="text-xs px-1.5 py-0.5 rounded"
                              :class="{
                                  'bg-yellow-100 text-yellow-800': ticket.status === 'pending',
                                  'bg-green-100 text-green-800': ticket.status === 'in_progress',
                                  'bg-blue-100 text-blue-800': ticket.status === 'open'
                              }" x-text="ticket.status"></span>
                        <span class="text-xs text-gray-400" x-text="ticket.form_type"></span>
                        <span x-show="ticket.agent" class="text-xs text-purple-600" x-text="'→ ' + (ticket.agent?.name || '')"></span>
                    </div>
                    <button x-show="!ticket.assigned_to && activeTab === 'open'"
                            @click.stop="$wire.claimTicket(ticket.id)"
                            class="mt-2 text-xs bg-blue-600 text-white px-2 py-1 rounded hover:bg-blue-700 transition">
                        Claim
                    </button>
                </div>
            </template>
            <div x-show="$wire.tickets.filter(t => activeTab === 'open' ? !t.assigned_to : t.assigned_to === {{ auth()->id() }}).length === 0"
                 class="p-6 text-center text-gray-400 text-sm">
                No tickets in this view.
            </div>
        </div>
    </div>

    <div class="flex-1 bg-white rounded-lg shadow overflow-hidden flex flex-col">
        <template x-if="$wire.selectedTicketId">
            <div class="flex flex-col h-full">
                <div class="p-3 border-b bg-gray-50">
                    <div class="font-medium text-sm" x-text="$wire.selectedTicket?.name"></div>
                    <div class="text-xs text-gray-500">
                        <span x-text="$wire.selectedTicket?.email"></span>
                        <span class="mx-1">·</span>
                        <span x-text="$wire.selectedTicket?.ticket_number"></span>
                    </div>
                </div>

                <div class="flex-1 overflow-y-auto p-4 space-y-3" wire:poll.3s="refreshMessages">
                    <template x-for="msg in $wire.messages" :key="msg.id">
                        <div :class="{'text-right': msg.sender_type === 'agent', 'text-left': msg.sender_type !== 'agent'}"
                             class="flex flex-col">
                            <div :class="msg.sender_type === 'agent' ? 'bg-blue-600 text-white rounded-l-lg rounded-tr-lg' : 'bg-gray-100 text-gray-800 rounded-r-lg rounded-tl-lg'"
                                 class="inline-block max-w-[75%] px-3 py-2 text-sm">
                                <span x-text="msg.message"></span>
                            </div>
                            <span class="text-xs text-gray-400 mt-0.5 px-1" x-text="new Date(msg.created_at).toLocaleTimeString([], {hour:'2-digit',minute:'2-digit'})"></span>
                        </div>
                    </template>
                    <div x-show="$wire.userTyping" class="text-left flex items-center gap-1 text-gray-400 text-xs italic px-1">
                        <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay:0s"></span>
                        <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay:0.2s"></span>
                        <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay:0.4s"></span>
                        <span class="ml-1">typing...</span>
                    </div>
                </div>

                <div class="p-3 border-t">
                    <form @submit.prevent="$wire.sendMessage()" class="flex gap-2">
                        <input type="text" x-model="$wire.newMessage"
                               @keydown.debounce.500ms="$wire.agentTyping()"
                               class="flex-1 border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                               placeholder="Type your response...">
                        <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition">
                            Send
                        </button>
                    </form>
                </div>
            </div>
        </template>
        <template x-if="!$wire.selectedTicketId">
            <div class="flex-1 flex items-center justify-center text-gray-400 text-sm">
                Select a ticket to start chatting
            </div>
        </template>
    </div>

    <div wire:poll.3s="checkTyping"></div>
</div>
