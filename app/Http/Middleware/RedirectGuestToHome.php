<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectGuestToHome
{
    public function handle(Request $request, Closure $next)
    {
        // If user is NOT logged in -> always go to homepage
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
