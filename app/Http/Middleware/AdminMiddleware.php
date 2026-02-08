<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        /*
         |--------------------------------------------------------------
         | If user is NOT logged in → redirect to login
         |--------------------------------------------------------------
         */
        if (!Auth::check()) {
            return redirect('/login');
        }

        /*
         |--------------------------------------------------------------
         | Logged in but NOT admin → redirect to homepage
         |--------------------------------------------------------------
         */
        $adminEmails = config('admin.emails', []);

        if (!in_array(Auth::user()->email, $adminEmails)) {
            return redirect('/');
        }

        /*
         |--------------------------------------------------------------
         | User is admin → allow request
         |--------------------------------------------------------------
         */
        return $next($request);
    }
}
