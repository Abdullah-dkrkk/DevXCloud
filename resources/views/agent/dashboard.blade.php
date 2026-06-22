@extends('layouts.admin')

@section('title', 'Agent Dashboard')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Agent Dashboard</h2>
@endsection

@section('content')
    @livewire('agent.dashboard')
@endsection
