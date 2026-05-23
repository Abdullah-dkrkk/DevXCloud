<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\QuestionAnswered;
use App\Models\ChatHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'pending');

        $query = ChatHistory::query();

        if ($filter === 'pending') {
            $query->where('source', 'pending');
        } elseif ($filter === 'answered') {
            $query->whereIn('source', ['bot', 'admin']);
        }

        $questions = $query->with('user')
            ->orderBy('asked_at', 'desc')
            ->paginate(10);

        $counts = [
            'total' => ChatHistory::count(),
            'pending' => ChatHistory::where('source', 'pending')->count(),
            'bot' => ChatHistory::where('source', 'bot')->count(),
            'admin' => ChatHistory::where('source', 'admin')->count(),
        ];

        return view('admin.questions.index', compact('questions', 'counts', 'filter'));
    }

    public function showAnswerForm($id)
    {
        $question = ChatHistory::with('user')->findOrFail($id);

        if ($question->source !== 'pending') {
            return redirect()->route('admin.questions.index')
                ->with('error', 'This question has already been answered.');
        }

        return view('admin.questions.answer', compact('question'));
    }

    public function submitAnswer(Request $request, $id)
    {
        $request->validate([
            'answer' => 'required|string|min:2|max:2000',
        ]);

        $question = ChatHistory::with('user')->findOrFail($id);

        if ($question->source !== 'pending') {
            return back()->with('error', 'This question has already been answered.');
        }

        $question->update([
            'answer' => $request->answer,
            'source' => 'admin',
            'answered_by' => auth()->id(),
            'answered_at' => now(),
        ]);

        $notified = false;
        if ($question->user && $question->user->email) {
            Mail::to($question->user->email)
                ->send(new QuestionAnswered($question));
            $notified = true;
        }

        $msg = 'Answer submitted successfully.';
        if ($notified) {
            $msg .= ' The user has been notified via email.';
        }

        return redirect()->route('admin.questions.index', ['filter' => 'pending'])
            ->with('success', $msg);
    }
}
