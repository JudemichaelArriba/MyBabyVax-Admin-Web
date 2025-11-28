<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('pages.dashboard'); // make sure the path matches your blade file
})->name('dashboard');


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