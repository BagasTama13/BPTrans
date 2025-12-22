<?php

use Illuminate\Support\Facades\Route;

// =======================
// PUBLIC LANDING PAGE
// =======================
Route::get('/', function () {
    return view('dashboard');
});

// =======================
// ADMIN AUTH
// =======================
Route::get('/admin/login', fn () => view('admin.login'));

Route::post('/admin/login', function () {
    if (request('username') === 'admin' && request('password') === 'admin123') {
        session(['is_admin' => true]);
        return redirect('/admin/dashboard');
    }
    return back()->with('error', 'Login gagal');
});

// =======================
// ADMIN DASHBOARD
// =======================
Route::get('/admin/dashboard', function () {
    if (!session('is_admin')) {
        return redirect('/admin/login');
    }
    return view('admin.dashboard');
});

// =======================
// ADMIN LOGOUT
// =======================
Route::post('/admin/logout', function () {
    session()->forget('is_admin');
    return redirect('/admin/login');
});
