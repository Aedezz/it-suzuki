<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cdash;
use App\Http\Controllers\Clogin;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\Cpembuatan;

// Route for the dashboard/welcome page
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Routes for form input with CobaController
Route::prefix('data-entry')->group(function () {
    Route::get('/create', [CobaController::class, 'create'])->name('data-entry.create');
    Route::post('/store', [CobaController::class, 'store'])->name('data-entry.store');
});

// Routes for guests (unauthenticated users)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [Clogin::class, 'index'])->name('login');
    Route::post('/login', [Clogin::class, 'login_proses'])->name('login_proses');
});

// Redirect /home to the main dashboard for authenticated users
Route::get('/home', function () {
    return redirect()->route('main2');
})->name('home');

// Routes for different form views
Route::view('/installasi-pc', 'form-db/pc')->name('installasi-pc');
Route::view('/pembuatan-user', 'form-db/pembuatan')->name('pembuatan-user');
Route::view('/perbaikan', 'form-db/perbaikan')->name('perbaikan');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/main2', [Cdash::class, 'index'])->name('main2');
    Route::get('/logout', [Clogin::class, 'logout'])->name('logout');
});

// Route for fetching data from InstallController
Route::get('/fetch-data/{nik}', [InstallController::class, 'fetchData']);

// Resource route for Cpembuatan controller
Route::resource('/form-db/user', Cpembuatan::class);
