<?php

use Illuminate\Support\Facades\Route;
<<<<<<< Updated upstream
=======
use App\Http\Controllers\Cdash;
use App\Http\Controllers\Clogin;
use App\Http\Controllers\Cuser;

>>>>>>> Stashed changes

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

<<<<<<< Updated upstream
// routes/web.php
=======

// Routes for guests (unauthenticated users)
Route::middleware(['guest'])->group(function () { 
    Route::get('/login', [Clogin::class, 'index'])->name('login'); 
    Route::post('/login', [Clogin::class, 'login_proses'])->name('login_proses'); 
}); 

// Redirect /home to main2 for authenticated users
Route::get('/home', function () { 
    return redirect()->route('main2'); 
})->name('home');

// Form routes for both authenticated and guest users (no auth middleware)
>>>>>>> Stashed changes
Route::get('/pembuatan-user', function () {
    return view('form-db/user'); // Ensure 'user.blade.php' is located in the 'resources/views' folder
});

Route::get('/installasi-pc', function () {
    return view('form-db/pc');
});

Route::get('/perbaikan', function () {
    return view('form-db/perbaikan');
});

<<<<<<< Updated upstream
// Route::resource()
=======
Route::resource('pembuatan',Cuser::class);
>>>>>>> Stashed changes
