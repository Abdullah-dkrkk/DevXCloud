<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::post('/chat/reply', [App\Http\Controllers\ChatController::class, 'reply']);
Route::get('/chat/history', [App\Http\Controllers\ChatController::class, 'history']);
Route::post('/chat/submit-form', [App\Http\Controllers\ChatController::class, 'submitForm']);
Route::get('/chat/agent-status', [App\Http\Controllers\ChatController::class, 'agentStatus']);
Route::post('/chat/agent-offline', [App\Http\Controllers\ChatController::class, 'agentOffline']);
Route::post('/chat/ticket/messages', [App\Http\Controllers\ChatController::class, 'userMessages']);
Route::post('/chat/ticket/history', [App\Http\Controllers\ChatController::class, 'ticketHistory']);
Route::post('/chat/typing', [App\Http\Controllers\ChatController::class, 'typing']);
Route::get('/chat/typing/{ticketId}', [App\Http\Controllers\ChatController::class, 'typingStatus']);

// Agent tickets page removed — now handled inside main /dashboard

Route::middleware(['auth'])->prefix('chat/agent')->name('chat.agent.')->group(function () {
    Route::post('/claim', [App\Http\Controllers\AgentController::class, 'claim'])->name('claim');
    Route::post('/reply', [App\Http\Controllers\AgentController::class, 'reply'])->name('reply');
    Route::get('/tickets', [App\Http\Controllers\AgentController::class, 'tickets'])->name('tickets');
    Route::get('/tickets/{ticket}/messages', [App\Http\Controllers\AgentController::class, 'messages'])->name('messages');
    Route::post('/close-request', [App\Http\Controllers\AgentController::class, 'closeTicket'])->name('close-request');
    Route::post('/force-close', [App\Http\Controllers\AgentController::class, 'forceClose'])->name('force-close');
});

Route::post('/chat/user-close', [App\Http\Controllers\ChatController::class, 'userCloseTicket']);

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/commerce-ai', fn () => view('commerce-ai'))->name('commerce-ai');
Route::get('/launchpad-ai', fn () => view('launchpad-ai'))->name('launchpad-ai');
Route::get('/scalecloud-ai', fn () => view('scalecloud-ai'))->name('scalecloud-ai');
Route::get('/elitescale-ai', fn () => view('elitescale-ai'))->name('elitescale-ai');
Route::get('/greenscale-ai', fn () => view('greenscale-ai'))->name('greenscale-ai');

Route::get('/terms-of-service', fn () => view('privacy-terms'))->name('terms-of-service');
Route::get('/privacy-policy', fn () => view('privacy-terms'))->name('privacy-policy');
Route::get('/privacy-terms', fn () => view('privacy-terms'))->name('privacy-terms');

Route::get('/contact', fn () => view('contact'))->name('contact');


Route::post('/contact-submit', [ContactController::class, 'submit'])
    ->name('contact.submit');



Route::get('/states/{countryCode}', function ($countryCode) {

    $result = \Nnjeim\World\World::states([
        'filters' => [
            'country_code' => $countryCode
        ]
    ]);

    return response()->json([
        'data' => $result->data ?? []
    ]);
});

Route::get('/chat/re-engage/{ticket_id}/{token}', function ($ticketId, $token) {
    $ticket = \App\Models\ChatTicket::find($ticketId);
    if (!$ticket) {
        abort(404, 'Ticket not found');
    }

    $expected = sha1($ticket->id . $ticket->email . 'devxcloud-salt');
    if ($token !== $expected) {
        abort(403, 'Invalid token');
    }

    return redirect(route('home') . '?re=' . $ticketId);
})->name('chat.reengage');