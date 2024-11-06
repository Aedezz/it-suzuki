<?php

use Illuminate\Support\Facades\Route;

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

// routes/web.php
Route::get('/pembuatan-user', function () {
    return view('form-db/user'); // Ensure 'user.blade.php' is located in the 'resources/views' folder
});

Route::get('/installasi-pc', function () {
    return view('form-db/pc');
});

Route::get('/perbaikan', function () {
    return view('form-db/perbaikan');
});

// Route::resource()