<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Landing page
Route::get('/', function () {
    return view('welcome');
});

// Login page
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');

// Process login
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');