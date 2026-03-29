<?php

use BotMan\BotMan\BotMan;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


Route::post('/chatbot', [ChatbotController::class, 'reply']);
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(['auth', 'verified', 'admin'])
//     ->prefix('admin/bot-questions')
//     ->group(function () {
//         // Package routes are already registered inside vendor
//         // Wrapping them ensures middleware protection

//         // Now you can use named routes safely
//         Route::get('/', function () {
//             return redirect()->route('bot-questions.index');
//         });

//         Route::get('/create', function () {
//             return redirect()->route('bot-questions.create');
//         });

//         Route::get('/import', function () {
//             return redirect()->route('bot-questions.import');
//         });
//     });

/*
|--------------------------------------------------------------------------
| Laravel-Chatbot (PROTECTED)
| Requirement:
| - If NOT logged in => redirect to homepage (NOT login page)
| - If logged in => allow access
|--------------------------------------------------------------------------
// */
// Route::middleware(['guest.to.home', 'admin'])
//     ->prefix('admin/bot-questions')
//     ->group(function () {

//         Route::get('/', function () {
//             return view('vendor.laravel-chatbot.pages.bot-questions.index');
//         })->name('bot-questions.index');

//         Route::get('/create', function () {
//             return view('vendor.laravel-chatbot.pages.bot-questions.create');
//         })->name('bot-questions.create');

//         Route::get('/import', function () {
//             return view('vendor.laravel-chatbot.pages.bot-questions.import');
//         })->name('bot-questions.import');

//     });

/*
|--------------------------------------------------------------------------
| /chatbot page protection
| Package provides route('botman.web-chat') for chat UI. :contentReference[oaicite:2]{index=2}
| We create a friendly URL /chatbot that redirects to the package chat route.
|--------------------------------------------------------------------------
*/

// Route::middleware(['guest.to.home', 'admin'])
//     ->get('/chatbot', function () {
//         return view('vendor.laravel-chatbot.pages.botman-chat');
//     })
//     ->name('chatbot');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';



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