<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash; // Added for completeness if you ever use Hash::make()

class UserController extends Controller
{
    /**
     * Display the login form.
     *
     * @return \Illuminate\View\View
     */
    public function LoginForm()
    {
        // echo Hash::make('123');
        return view('auth.login');
    }

    /**
     * Handle user login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate the incoming request data
        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);

        $remember = !empty($request->remember) ? true : false;

        // Attempt to authenticate the user with the specified conditions
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'is_admin' => 1, // Ensure this matches your database user
            'is_delete' => 0, // Ensure this matches your database user
            'status' => 1 // Ensure this matches your database user
        ], $remember)) {
            // Regenerate the session to prevent session fixation attacks
            // $request->session()->regenerate();

            // Flash a success message
            // session()->flash('success', 'Login successful! Welcome back.');

            // Redirect to the admin dashboard page after successful login, as requested
            return redirect()->route('admin.dashboard'); 
        } else {
            // If authentication fails, redirect back with a more specific error message
            // This error implies either incorrect credentials OR the user doesn't meet the 'is_admin', 'is_delete', 'status' criteria.
            return redirect()->back()->with('error', 'Login failed. Please check your email, password, and ensure your account is active and has admin privileges.');
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();

            // Invalidate the session and regenerate the CSRF token
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Flash a success message
            session()->flash('success', 'You have been successfully logged out.');
        }

        // Redirect to the login page after logout
        return redirect()->route('login.form');
    }

    /**
     * Display the registration form.
     * This method is added for completeness, assuming you have a register view.
     *
     * @return \Illuminate\View\View
     */
    public function registerForm()
    {
        return view('auth.register');
    }
}