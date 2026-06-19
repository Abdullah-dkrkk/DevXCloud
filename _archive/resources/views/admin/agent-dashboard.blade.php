<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Agent Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <livewire:agent-dashboard />
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/pusher-js@8.2.0/dist/web/pusher.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.16.1/dist/echo.iife.js"></script>
        <script>
            window.Pusher = Pusher;
            window.Echo = new Echo({
                broadcaster: 'reverb',
                key: '{{ config('reverb.apps.apps.0.key') }}',
                wsHost: '{{ config('reverb.servers.reverb.hostname', 'localhost') }}',
                wsPort: {{ config('reverb.servers.reverb.port', 8081) }},
                wssPort: {{ config('reverb.servers.reverb.port', 8081) }},
                forceTLS: false,
                enabledTransports: ['ws', 'wss'],
            });
        </script>
    @endpush
</x-app-layout>
