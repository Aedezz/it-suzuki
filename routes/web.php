<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cdash;
use App\Http\Controllers\Clogin;

// Routes for guests (unauthenticated users)
Route::middleware(['guest'])->group(function () { 
    Route::get('/', [Clogin::class, 'index'])->name('login'); 
    Route::post('/', [Clogin::class, 'login_proses'])->name('login_proses'); 
}); 
 
Route::get('/home', function () { 
    return redirect('dashboard'); 
}); 
 
Route::middleware(['auth'])->group(function () { 
    Route::get('/logout', [Clogin::class, 'logout'])->name('logout'); 
    Route::get('/main', [Cdash::class, 'index'])->name('main'); 
    // Route::resource('/siswa', Csiswa::class); 
}); 

// Routes for other pages (accessible to authenticated users)
Route::get('/pembuatan-user', function () {
    return view('form-db/user');
});
Route::get('/installasi-pc', function () {
    return view('form-db/pc');
});
Route::get('/perbaikan', function () {
    return view('form-db/perbaikan');
});
