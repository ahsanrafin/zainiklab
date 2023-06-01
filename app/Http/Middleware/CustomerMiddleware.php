<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Business logic for Block/Unblock for Customer
        if (Auth::check() && Auth::user()->is_blocked && auth()->user()->blocked_until && now()->lessThan(auth()->user()->blocked_until)) {
            $blockedMinutes = now()->diffInMinutes(auth()->user()->blocked_until);
            $blockeUser = Auth::user()->is_blocked == 1;
            Auth::logout();

            if ($blockeUser == 1) {
                $message = "Your account has been blocked, Please contact with Administrator.";
            }

            if ($blockedMinutes > 45) {
                $message45Minutes = 'Your account has been suspended. Please contact administrator.';
            } else {
                $message45Min = 'Your account has been suspended for '.$blockedMinutes.' '.Str::plural('minute', $blockedMinutes).'. Please contact administrator.';
            }

            return redirect()->route('login')->with('status', $message)->withErrors([
                'blocked' => 'Your account has been blocked, Please contact with Administrator.',
                'message45Min' => $message45Min
            ]);
        }

        //Business logic for Multiple Authentication
        if (Auth::check() && Auth::user()->role_id == 2) {
            return $next($request);
        }else{
            return redirect()->route('login');
        }
    }
}
