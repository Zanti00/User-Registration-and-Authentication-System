<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Redirect root to the login page
Route::get('/', function () {
    return redirect()->route('login');
});

// Protect the category route with the auth middleware

Route::middleware(['auth'])->group(function (){
    Route::resource('category', CategoryController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy', 'show',
    ]);;
});

// Authentication routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');