<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

// Authentication Routes
Route::get('/', [UserController::class, 'LoginForm'])->name('login.form');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    // Admin Dashboard

    Route::get('/' , function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    // Products
    Route::resource('products', ProductController::class);
    Route::get('/showProduct' , [ProductController::class, 'show'])->name('pages.product');
    Route::get('/editProduct' , [ProductController::class, 'edit'])->name('edit.product');
    Route::get('/addProduct' , [ProductController::class, 'create'])->name('add.product');

    // Categories
    Route::resource('categories', CategoryController::class);
    Route::get('/showCategory' , [CategoryController::class, 'show'])->name('pages.category');
    Route::get('/editCategory' , [CategoryController::class, 'edit'])->name('edit.category');
    Route::get('/addCategory' , [CategoryController::class, 'create'])->name('pages.addcategory');

    // Users
    Route::resource('users', UserController::class)->except(['create', 'store']);
    Route::get('/showUser' , [UserController::class, 'show'])->name('pages.user');
    Route::get('/showUserPf' , [UserController::class, 'showPf'])->name('pages.userpf');
    Route::get('/addUser' , [UserController::class , 'create'])->name('add.user');
    Route::get('/editUser' , [UserController::class , 'edit'])->name('pages.edituser');

    
});

