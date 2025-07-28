<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            // If not authenticated, redirect to login page
            return redirect()->route('login'); // Assuming you have a 'login' route
        }

        // Check if the authenticated user has the 'admin' role
        // This assumes your User model has a 'role' column (as defined in the migration I provided)
        // and that 'admin' is the value for admin users.
        if (Auth::user()->role !== 'admin') {
            // If the user is not an admin, redirect them or abort with a 403 Forbidden error
            // You can customize this redirect to a different page, e.g., a home page or an error page.
            return redirect('/')->with('error', 'You do not have admin access.');
            // Alternatively, to show a forbidden page:
            // abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
