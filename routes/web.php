<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\UserAuthication;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Public routes (accessible to everyone)
// The root route now points to the login form
Route::get('/', [UserController::class, 'LoginForm'])->name('login.form');

// Login routes
Route::get('login', [UserController::class, 'LoginForm'])->name('login.form');
Route::post('login', [UserController::class, 'login'])->name('login');

// Logout route
Route::post('logout', [UserController::class, 'logout'])->name('logout'); // Changed to POST for security

// Explicit registration route (if you want a separate /register URL)
Route::get('/register', [UserController::class, 'registerForm'])->name('register');

// Protected routes (require authentication via UserAuthication middleware)
Route::middleware([UserAuthication::class])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); 
    })->name('admin.dashboard');

    Route::get('/product' , function(){
        return view('pages.product');
    })->name('pages.product');

    Route::get('/addproduct' , function() {
        return view('pages.addproduct');
    })->name('add.product');

    Route::get('/editProduct' , function() {
        return view('pages.editproduct');
    })->name('edit.product');

    Route::get('/category' , function(){
        return view('pages.category');
    })->name('pages.category');

    Route::get('/addcategory' , function(){
        return view('pages.addcategory');
    })->name('pages.addcategory');

    Route::get('/editcategory' , function(){
        return view('pages.editcategory');
    })->name('edit.category');

    Route::get('/user' , function(){
        return view('pages.user');
    })->name('pages.user');

    Route::get('/userProfile' , function(){
        return view('pages.userpf');
    })->name('pages.userpf');

    Route::get('/editUser' , function(){
        return view('pages.edituser');
    })->name('pages.edituser');

    Route::get('/addUser' , function(){
        return view('pages.adduser');
    })->name('add.user');

});