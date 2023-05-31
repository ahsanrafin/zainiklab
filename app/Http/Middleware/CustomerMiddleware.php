<?php

namespace App\Http\Middleware;

use Closure;
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
        if (Auth::check() && Auth::user()->is_blocked) {
            $bannedUser = Auth::user()->is_blocked == 1;
            Auth::logout();

            if ($bannedUser == 1) {
                $message = "Your account has been blocked, Please contact with Administrator.";
            }

            return redirect()->route('login')->with('status', $message)->withErrors([
                'blocked' => 'Your account has been blocked, Please contact with Administrator.'
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
