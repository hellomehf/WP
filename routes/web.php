<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

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
        $products = Product::orderBy('created_at','DESC')->paginate(10);
        $dashProduct = DB::select("Select count(*) as totalproduct from products");
        $dashCategory = DB::select("Select count(*) as totalcategory from categories");
        $dashUser = DB::select("select count(*) as totaluser from users ");
        return view('admin.dashboard' ,compact('products','dashProduct','dashCategory','dashUser'));
    })->name('admin.dashboard');
    
    // Products
    Route::get('/admin/product' , [ProductController::class, 'products'])->name('pages.product');
    Route::get('/admin/product/add' , [ProductController::class, 'product_add'])->name('add.product');
    Route::post('/admin/product/store' , [ProductController::class, 'product_store'])->name('admin.product.store');
    Route::get('/admin/product/{id}/edit' , [ProductController::class , 'product_edit'])->name('admin.edit.product');
    Route::put('/admin/product/update', [ProductController::class , 'product_update'])->name('update.product');
    Route::delete('/admin/product/{id}/delete' , [ProductController::class , 'product_delete'])->name('delete.product');
    
    // Categories
    Route::get('/showCategory' , [CategoryController::class, 'categorires'])->name('pages.category');
    Route::get('/editCategory/{id}' , [CategoryController::class, 'edit'])->name('edit.category');
    Route::put('/updateCategory' , [CategoryController::class, 'update'])->name('udpate.category');
    Route::get('/addCategory' , [CategoryController::class, 'create'])->name('pages.addcategory');
    Route::delete('/deleteCategory/{id}/delete', [CategoryController::class , 'destroy'])->name('pages.delete');
    Route::post('/storeCategory' , [CategoryController::class, 'store'])->name('store.category');

    // Users
    Route::get('/showUser' , [UserController::class, 'user'])->name('pages.user');
    Route::get('/showUserPf' , [UserController::class, 'showPf'])->name('pages.userpf');
    
});

