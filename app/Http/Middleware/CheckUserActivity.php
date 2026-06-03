<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserActivity
{
    const TIMEOUT_MINUTES = 120;

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $lastActivity = session('last_activity');

            if ($lastActivity && now()->diffInMinutes($lastActivity) >= self::TIMEOUT_MINUTES) {
                Auth::logout();
                session()->flush();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect('/login')->with('error', 'You have been logged out due to inactivity (2 hours).');
            }

            session(['last_activity' => now()]);
        }

        return $next($request);
    }
}
