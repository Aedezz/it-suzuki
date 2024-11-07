<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cdash;
use App\Http\Controllers\Clogin;

// Routes for guests (unauthenticated users)
Route::middleware(['guest'])->group(function () { 
    Route::get('/', [Clogin::class, 'index'])->name('login'); 
    Route::post('/', [Clogin::class, 'login_proses'])->name('login_proses'); 
}); 

// Redirect /home to the main/dashboard page for consistency
Route::get('/home', function () { 
    return redirect()->route('dashboard'); 
}); 

// Routes for authenticated users
Route::middleware(['auth'])->group(function () { 
    Route::get('/home', [Cdash::class, 'index'])->name('dashboard'); // Define 'main' route for authenticated users
    Route::get('/dashboard', [Cdash::class, 'index'])->name('dashboard');
    Route::get('/logout', [Clogin::class, 'logout'])->name('logout'); 
});

// Routes for other pages (accessible to authenticated users)
Route::middleware(['auth'])->group(function () {
    Route::get('/pembuatan-user', function () {
        return view('form-db/user');
    });
    Route::get('/installasi-pc', function () {
        return view('form-db/pc');
    });
    Route::get('/perbaikan', function () {
        return view('form-db/perbaikan');
    });
});
