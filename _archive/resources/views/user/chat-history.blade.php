<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('My Chat History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid max-[500px]:grid-cols-1 grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <div class="bg-white rounded-lg shadow p-4 text-center">
                    <div class="text-3xl font-bold">{{ $stats['total'] }}</div>
                    <div class="text-base text-gray-500">Total Questions</div>
                </div>
                <div class="bg-white rounded-lg shadow p-4 text-center">
                    <div class="text-3xl font-bold text-green-600">{{ $stats['bot'] }}</div>
                    <div class="text-base text-gray-500">Answered by Bot</div>
                </div>
                <div class="bg-white rounded-lg shadow p-4 text-center">
                    <div class="text-3xl font-bold text-blue-600">{{ $stats['admin'] }}</div>
                    <div class="text-base text-gray-500">Answered by Admin</div>
                </div>
                <div class="bg-white rounded-lg shadow p-4 text-center">
                    <div class="text-3xl font-bold text-yellow-600">{{ $stats['pending'] }}</div>
                    <div class="text-base text-gray-500">Pending</div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('user.chat-history', ['filter' => 'all', 'sort' => $sort]) }}"
                           class="px-4 py-2 rounded text-sm font-medium {{ $filter === 'all' ? 'bg-gray-800 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                            All
                        </a>
                        <a href="{{ route('user.chat-history', ['filter' => 'bot', 'sort' => $sort]) }}"
                           class="px-4 py-2 rounded text-sm font-medium {{ $filter === 'bot' ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                            Bot
                        </a>
                        <a href="{{ route('user.chat-history', ['filter' => 'admin', 'sort' => $sort]) }}"
                           class="px-4 py-2 rounded text-sm font-medium {{ $filter === 'admin' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                            Admin
                        </a>
                        <a href="{{ route('user.chat-history', ['filter' => 'pending', 'sort' => $sort]) }}"
                           class="px-4 py-2 rounded text-sm font-medium {{ $filter === 'pending' ? 'bg-yellow-500 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                            Pending
                        </a>
                    </div>

                    <div class="flex items-center gap-2">
                        <label class="text-sm text-gray-500">Sort:</label>
                        <a href="{{ route('user.chat-history', ['filter' => $filter, 'sort' => 'newest']) }}"
                           class="px-3 py-1.5 rounded text-xs font-medium {{ $sort === 'newest' ? 'bg-gray-800 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                            Newest
                        </a>
                        <a href="{{ route('user.chat-history', ['filter' => $filter, 'sort' => 'oldest']) }}"
                           class="px-3 py-1.5 rounded text-xs font-medium {{ $sort === 'oldest' ? 'bg-gray-800 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                            Oldest
                        </a>
                    </div>
                </div>
            </div>

            @if($histories->count() === 0)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-12 text-center text-gray-500">
                        <p class="text-xl mb-2">No chat history yet.</p>
                        <p class="text-base">Start chatting with our support bot to see your history here.</p>
                    </div>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        @foreach($histories as $h)
                        <div class="border-b last:border-b-0 py-4">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 mt-1">
                                    @if($h->source === 'bot')
                                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    @elseif($h->source === 'admin')
                                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    @else
                                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="font-medium text-gray-900 text-lg">{{ $h->question }}</p>
                                    @if($h->answer)
                                        <div class="mt-2 p-4 bg-gray-50 rounded-lg text-gray-700 text-base">
                                            @if($h->source === 'bot')
                                                <span class="text-sm font-semibold text-green-600">Bot replied:</span>
                                            @else
                                                <span class="text-sm font-semibold text-blue-600">Admin replied:</span>
                                            @endif
                                            <p class="mt-1 text-base">{{ $h->answer }}</p>
                                        </div>
                                    @else
                                        <div class="mt-2 p-4 bg-yellow-50 rounded-lg text-base text-yellow-700">
                                            Pending &mdash; Our team will reply soon.
                                        </div>
                                    @endif
                                    <p class="text-sm text-gray-400 mt-1">{{ $h->asked_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="mt-4">
                            {{ $histories->appends(['filter' => $filter, 'sort' => $sort])->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
