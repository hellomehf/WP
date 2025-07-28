<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAuthication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If the user is not authenticated, redirect them to the login page.
        if (!Auth::check()) {
            // Optionally, add a flash message to inform the user they need to log in.
            session()->flash('error', 'You must be logged in to access this page.');
            return redirect()->route('login.form'); // Redirect to the named login form route
        }
        return $next($request);
    }
}