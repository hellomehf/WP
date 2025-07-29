<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $remember = !empty($request->remember) ? true : false;

        // Attempt to authenticate the user with the specified conditions
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'is_admin' => 1, // Ensure this matches your database user
            'is_delete' => 0, // Ensure this matches your database user
            'status' => 1 // Ensure this matches your database user
        ], $remember)) {

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

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:wb_final_users,email', // Ensure unique email
            'password' => 'required|string|min:8|confirmed', // 'confirmed' checks for password_confirmation field
            // 'is_admin' => 'boolean', // Assuming these are not directly from the adduser form
            // 'role' => 'string|max:255',
            // 'status' => 'boolean',
            // 'is_delete' => 'boolean',
        ]);

        try {
            // Create a new user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Hash the password
                'is_admin' => 0, // Default to regular user upon registration
                'role' => 'user', // Default role
                'status' => 1, // Default status (active)
                'is_delete' => 0, // Default to not deleted
                'email_verified_at' => now(), // Assuming email is verified on creation or will be later
            ]);

            // Redirect to the user listing with a success message
            return redirect()->route('pages.user')->with('success', 'User created successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to create user. Please try again.');
        }
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function create(){
        return view('pages.adduser');
    }

    public function show()
    {
        return view('pages.user');
    }

    public function showPf() {
        return view('pages.userpf');
    }

    public function edit(){
        return view('pages.edituser');
    }

    public function adduser(){
        return view('pages.adduser');
    }
}
