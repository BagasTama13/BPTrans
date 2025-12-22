<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// ROOT URL → langsung ke dashboard publik
Route::get('/', function () {
    return view('dashboard'); // ini dashboard publik
});

// ADMIN ROUTES (protected)
Route::prefix('admin')->group(function () {
    // login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // halaman admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // admin dashboard (buat folder admin di views)
    })->middleware('auth');
});

