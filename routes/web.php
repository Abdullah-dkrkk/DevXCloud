<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
