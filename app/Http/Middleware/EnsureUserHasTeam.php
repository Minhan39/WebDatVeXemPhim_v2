<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasTeam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->hasVerifiedEmail()) {
                // Check if the user is part of the "Admin" team
                if ($user->currentTeam->name !== 'Admin team') {
                    // Redirect to the home page if the user is not part of the "Admin" team
                    return redirect('/');
                }
            } else {
                // Redirect to email verification if email is not verified
                return redirect()->route('verification.notice');
            }
        }

        return $next($request);
    }
}
