@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="flex flex-col min-h-0" style="height: calc(100vh - 4rem);">
        <div class="flex-shrink-0 max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 pt-6 pb-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="display: none;">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
        <div class="flex-1 min-h-0 px-4 sm:px-6 lg:px-8 pb-4 max-w-7xl mx-auto w-full">
            @livewire('agent.dashboard')
        </div>
    </div>
@endsection
