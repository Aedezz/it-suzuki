<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cdash;
use App\Http\Controllers\Clogin;
use Illuminate\Support\Facades\Auth;

// Public default dashboard route for unauthenticated users
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('main2'); // Redirect to main2 if already authenticated
    }
    return view('dashboard'); // This view serves as the public dashboard
})->name('default.dashboard');

// Guest routes
Route::middleware(['guest'])->group(function () { 
    Route::get('/login', [Clogin::class, 'index'])->name('login'); 
    Route::post('/login', [Clogin::class, 'login_proses'])->name('login_proses'); 
}); 

// Authenticated routes
Route::middleware(['auth'])->group(function () { 
    Route::get('/main2', [Cdash::class, 'index'])->name('main2'); // Main dashboard for authenticated users
    Route::get('/logout', [Clogin::class, 'logout'])->name('logout'); 
});

Route::get('/home', function () { 
    return redirect()->route('main2'); 
})->name('dashboard');


Route::get('/pembuatan-user', function () {
    return view('form-db/user');
});
Route::get('/installasi-pc', function () {
    return view('form-db/pc');
});
Route::get('/perbaikan', function () {
    return view('form-db/perbaikan');
});
