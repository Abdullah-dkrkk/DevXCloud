<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Answer Question') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-base">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="text-base text-gray-500 mb-2">
                        Asked {{ $question->asked_at->diffForHumans() }}
                        by <strong>{{ $question->user?->name ?? 'Guest' }}</strong>
                        ({{ $question->user?->email ?? 'No account' }})
                    </div>
                    <div class="bg-gray-100 rounded-lg p-4 mt-2">
                        <h3 class="font-semibold text-lg mb-2">Question:</h3>
                        <p class="text-gray-800 text-lg">{{ $question->question }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="font-semibold text-xl mb-4">Your Answer</h3>
                    <form method="POST" action="{{ route('admin.questions.answer.submit', $question->id) }}">
                        @csrf
                        <textarea name="answer" rows="6"
                                  class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 p-3 text-base"
                                  placeholder="Type your answer here..." required></textarea>
                        @error('answer')
                            <p class="text-red-500 text-base mt-1">{{ $message }}</p>
                        @enderror
                        <div class="flex justify-end gap-3 mt-4">
                            <a href="{{ route('admin.questions.index') }}"
                               class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 text-base">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 text-base">
                                Submit Answer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
