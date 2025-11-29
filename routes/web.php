<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return redirect()->route('login');
});

// Show login form
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Handle login submission
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');



Route::get('/appointments', function () {
    return view('pages.appointments');
})->name('appointments');

Route::get('/users', function () {
    return view('pages.users');
})->name('users');

Route::get('/vaccines', function () {
    return view('pages.vaccines');
})->name('vaccines');

Route::get('/reports', function () {
    return view('pages.reports');
})->name('reports');

Route::get('/settings', function () {
    return view('pages.settings');
})->name('settings');