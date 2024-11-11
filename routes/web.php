<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cdash;
use App\Http\Controllers\Clogin;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\Cpembuatan;
use App\Http\Controllers\perangkatController;
use Psy\VersionUpdater\Installer;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Routes for form input with CobaController
Route::get('/create', [CobaController::class, 'create'])->name('data-entry.create');
Route::post('/store', [CobaController::class, 'store'])->name('data-entry.store');

Route::get('/fetch-data/{nik}', [InstallController::class, 'fetchData']);
// Route::resource()
// Route::resource('/form-db/user',Cpembuatan::class);

// Route::resource('pembuatan',Cpembuatan::class);


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
// 0599d9d2510118ed05fdc56126d1f2ead9f6ff4a
Route::get('/fetch-data/{nik}', [InstallController::class, 'fetchData']);

// Resource route for Cpembuatan controller
// Route::resource('/form-db/user', Cpembuatan::class);

Route::get('/pembuatan/create', [Cpembuatan::class, 'create'])->name('pembuatan.create');
Route::post('/pembuatan/store', [Cpembuatan::class, 'store'])->name('pembuatan.store');

