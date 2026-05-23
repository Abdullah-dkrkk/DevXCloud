<?php

namespace App\Http\Controllers;

use App\Models\ChatHistory;
use Illuminate\Http\Request;

class UserChatHistoryController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'all');
        $sort = $request->get('sort', 'newest');

        $query = ChatHistory::where('user_id', auth()->id());

        if ($filter === 'bot') {
            $query->where('source', 'bot');
        } elseif ($filter === 'admin') {
            $query->where('source', 'admin');
        } elseif ($filter === 'pending') {
            $query->where('source', 'pending');
        }

        if ($sort === 'oldest') {
            $query->orderBy('asked_at', 'asc');
        } else {
            $query->orderBy('asked_at', 'desc');
        }

        $histories = $query->paginate(10);

        $stats = [
            'total' => ChatHistory::where('user_id', auth()->id())->count(),
            'bot' => ChatHistory::where('user_id', auth()->id())->where('source', 'bot')->count(),
            'admin' => ChatHistory::where('user_id', auth()->id())->where('source', 'admin')->count(),
            'pending' => ChatHistory::where('user_id', auth()->id())->where('source', 'pending')->count(),
        ];

        return view('user.chat-history', compact('histories', 'stats', 'filter', 'sort'));
    }
}
