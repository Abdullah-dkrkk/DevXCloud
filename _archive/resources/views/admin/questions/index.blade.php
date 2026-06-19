<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Support Questions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-base">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-base">
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid max-[500px]:grid-cols-1 grid-cols-2 lg:grid-cols-5 gap-4 mb-6">
                <div class="bg-white rounded-lg shadow p-4 text-center">
                    <div class="text-3xl font-bold">{{ $counts['total'] }}</div>
                    <div class="text-base text-gray-500">Total</div>
                </div>
                <div class="bg-white rounded-lg shadow p-4 text-center">
                    <div class="text-3xl font-bold text-yellow-600">{{ $counts['pending'] }}</div>
                    <div class="text-base text-gray-500">Pending</div>
                </div>
                <div class="bg-white rounded-lg shadow p-4 text-center">
                    <div class="text-3xl font-bold text-purple-600">{{ $counts['lead'] }}</div>
                    <div class="text-base text-gray-500">Leads</div>
                </div>
                <div class="bg-white rounded-lg shadow p-4 text-center">
                    <div class="text-3xl font-bold text-green-600">{{ $counts['bot'] }}</div>
                    <div class="text-base text-gray-500">Answered by Bot</div>
                </div>
                <div class="bg-white rounded-lg shadow p-4 text-center">
                    <div class="text-3xl font-bold text-blue-600">{{ $counts['admin'] }}</div>
                    <div class="text-base text-gray-500">Answered by Admin</div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex flex-wrap gap-2 mb-4">
                        <a href="{{ route('admin.questions.index', ['filter' => 'lead']) }}"
                           class="px-3 py-1.5 rounded text-sm {{ $filter === 'lead' ? 'bg-purple-600 text-white' : 'bg-gray-200' }}">
                            Leads
                        </a>
                        <a href="{{ route('admin.questions.index', ['filter' => 'pending']) }}"
                           class="px-3 py-1.5 rounded text-sm {{ $filter === 'pending' ? 'bg-yellow-500 text-white' : 'bg-gray-200' }}">
                            Pending
                        </a>
                        <a href="{{ route('admin.questions.index', ['filter' => 'answered']) }}"
                           class="px-3 py-1.5 rounded text-sm {{ $filter === 'answered' ? 'bg-blue-500 text-white' : 'bg-gray-200' }}">
                            Answered
                        </a>
                        <a href="{{ route('admin.questions.index', ['filter' => 'all']) }}"
                           class="px-3 py-1.5 rounded text-sm {{ $filter === 'all' ? 'bg-gray-700 text-white' : 'bg-gray-200' }}">
                            All
                        </a>
                    </div>

                    @if($questions->count() === 0)
                        <p class="text-gray-500 text-center py-8 text-base">No questions found.</p>
                    @else
                        <div class="overflow-x-auto">
                        <table class="w-full text-base">
                            <thead>
                                <tr class="border-b text-left">
                                    <th class="py-3 px-3">#</th>
                                    <th class="py-3 px-3">Question</th>
                                    <th class="py-3 px-3">User</th>
                                    <th class="py-3 px-3">Source</th>
                                    <th class="py-3 px-3">Asked</th>
                                    <th class="py-3 px-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($questions as $q)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-3">{{ $q->id }}</td>
                                    <td class="py-3 px-3 max-w-xs truncate">{{ $q->question }}</td>
                                    <td class="py-3 px-3">{{ $q->user?->name ?? 'Guest' }}</td>
                                    <td class="py-3 px-3">
                                        @if($q->source === 'lead')
                                            <span class="text-purple-600 font-semibold">Lead</span>
                                        @elseif($q->source === 'pending')
                                            <span class="text-yellow-600 font-semibold">Pending</span>
                                        @elseif($q->source === 'bot')
                                            <span class="text-green-600 font-semibold">Bot</span>
                                        @else
                                            <span class="text-blue-600 font-semibold">Admin</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-3 text-gray-500">{{ $q->asked_at->diffForHumans() }}</td>
                                    <td class="py-3 px-3">
                                        @if($q->source === 'pending')
                                            <a href="{{ route('admin.questions.answer', $q->id) }}"
                                               class="text-white bg-blue-500 hover:bg-blue-600 px-2 py-0.5 rounded text-xs">
                                                Answer
                                            </a>
                                        @else
                                            <span class="text-gray-400 text-xs">Answered</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>

                        <div class="mt-4">
                            {{ $questions->appends(['filter' => $filter])->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
