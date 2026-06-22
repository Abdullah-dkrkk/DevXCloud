<?php

namespace App\Http\Controllers;

use App\Models\ChatTicket;
use App\Models\ChatMessage;
use App\Mail\AgentReplied;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class AgentController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = $request->user();
        $user->update(['last_active_at' => now()]);
        return view('agent.dashboard');
    }

    public function claim(Request $request)
    {
        $user = $request->user();
        if (!$user->isAgent()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $ticket = ChatTicket::where('id', $request->ticket_id)
            ->whereIn('status', ['pending', 'open'])
            ->first();

        if (!$ticket) {
            return response()->json(['error' => 'Ticket not available'], 404);
        }

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

        return response()->json(['success' => true, 'ticket' => $ticket]);
    }

    public function reply(Request $request)
    {
        $user = $request->user();
        if (!$user->isAgent()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $data = $request->validate([
            'ticket_id' => 'required|exists:chat_tickets,id',
            'message' => 'required|string|max:5000',
        ]);

        $ticket = ChatTicket::where('id', $data['ticket_id'])
            ->where('assigned_to', $user->id)
            ->first();

        if (!$ticket) {
            return response()->json(['error' => 'Ticket not assigned to you'], 403);
        }

        $msg = ChatMessage::create([
            'ticket_id' => $ticket->id,
            'sender_id' => $user->id,
            'sender_type' => 'agent',
            'message' => $data['message'],
            'created_at' => now(),
        ]);

        $ticket->update(['last_activity_at' => now()]);

        try {
            Mail::to($ticket->email)->send(new AgentReplied($ticket, $msg));
        } catch (\Exception $e) {
            Log::error('Agent replied email failed: ' . $e->getMessage());
        }

        return response()->json(['success' => true, 'message' => $msg->load('sender')]);
    }

    public function messages(Request $request, ChatTicket $ticket)
    {
        $user = $request->user();
        if (!$user->isAgent()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        if ($ticket->assigned_to && $ticket->assigned_to !== $user->id && $user->role !== 'admin') {
            return response()->json(['error' => 'Not your ticket'], 403);
        }

        return response()->json([
            'messages' => $ticket->messages()->with('sender')->orderBy('created_at')->get(),
        ]);
    }

    public function tickets(Request $request)
    {
        $user = $request->user();
        if (!$user->isAgent()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $tickets = ChatTicket::whereIn('status', ['pending', 'open', 'in_progress'])
            ->when($user->role !== 'admin', function ($q) use ($user) {
                $q->where(function ($q) use ($user) {
                    $q->whereNull('assigned_to')
                      ->orWhere('assigned_to', $user->id);
                });
            })
            ->with('agent')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json(['tickets' => $tickets]);
    }
}
