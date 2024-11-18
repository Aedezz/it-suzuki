<?php

use App\Http\Controllers\FormGrup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\Cpembuatan;
use App\Http\Controllers\PerbaikanController;
use App\Http\Controllers\FormPerbaikanController;
use App\Http\Controllers\ChecklistPerbaikanController;
use App\Http\Controllers\LaporanPerbaikanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Ceklist;
use App\Http\Controllers\FormPc;
use App\Http\Controllers\Laporan;

<<<<<<< Updated upstream
//Dashboard depan
=======

>>>>>>> Stashed changes
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Dashboard dalam menu2
Route::get('/dashboard', function () {
    return redirect()->route('dalam/main2');
})->name('dashboard');

// Route Perbaikan Perangkat
Route::view('/perbaikan', 'form-db/perbaikan')->name('perbaikan');
Route::get('/perbaikan/create', [PerbaikanController::class, 'create'])->name('perbaikan.create');
Route::post('/perbaikan/store', [PerbaikanController::class, 'store'])->name('perbaikan.store');
Route::get('/view/{id}', [PerbaikanController::class, 'show'])->name('perbaikan.show');
Route::get('/table-perbaikan', function () {
    return view('table_perbaikan');
})->name('table_perbaikan');

// ROUTE FORM CHECKLIST PERBAIKAN CONTROLLER
Route::get('/perbaikan/checklist', [ChecklistPerbaikanController::class, 'index'])->name('checklist.index');
// ROUTE FORM DATA PERBAIKAN CONTROLLER
Route::get('/perbaikan/form', [FormPerbaikanController::class, 'index'])->name('form.index');
Route::delete('/perbaikan/{id}', [FormPerbaikanController::class, 'destroy'])->name('form.destroy');
Route::post('/perbaikan/{id}/update-status', [FormPerbaikanController::class, 'updateStatus'])->name('form.updateStatus');
Route::get('/perbaikan/laporan', [LaporanPerbaikanController::class, 'index'])->name('perbaikan.laporan');
///////////////////////////
// Route pembuatan
Route::view('/pembuatan-user', 'form-db/pembuatan')->name('pembuatan-user');
Route::get('/pembuatan/create', [Cpembuatan::class, 'create'])->name('pembuatan.create');
Route::post('/pembuatan/store', [Cpembuatan::class, 'store'])->name('pembuatan.store');

// Route Data Installasi Pc
Route::view('/installasi-pc', 'form-db/pc')->name('installasi-pc');
Route::get('/create-instal', [InstallController::class, 'create'])->name('pc.create');
Route::post('/store-instal', [InstallController::class, 'store'])->name('pc.store');
Route::get('/viewdata/{data}', [InstallController::class, 'viewdata'])->name('viewdata');

// Routes for form input with CobaController
Route::get('/create', [CobaController::class, 'create'])->name('data-entry.create');
Route::post('/store', [CobaController::class, 'store'])->name('data-entry.store');
Route::get('/view/{id}', [CobaController::class, 'show'])->name('data-entry.show');

Route::get('dashboard', function () {
    return view('dashboard.dashboard2');
})->middleware('auth');

//Login and Register Section
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('regi', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('regi', [AuthController::class, 'register']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/reset-password', [AuthController::class, 'showResetPasswordForm'])->name('reset.password.form');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('reset.password');

<<<<<<< Updated upstream
// Route Form Dalam Installasi Pc
Route::get('form-pc', [FormPc::class, 'form'])->name('table');
Route::delete('/delete-form/{id}', [FormPc::class, 'destroy'])->name('pc.destroy');
Route::post('/pc/check/{id}', [FormPc::class, 'check'])->name('pc.check');
Route::get('/pc/print/{id}', [FormPc::class, 'print'])->name('form_pc.print');

//Route Laporan Installasi Pc
Route::get('form-laporan', [Laporan::class, 'index'])->name('laporan');

//Route Ceklist Installasi Pc
Route::get('form-ceklist', [Ceklist::class, 'index'])->name('ceklist');
=======
Route::prefix('/form-pembuatan')->group(function() {
Route::get('/create', [FormPembuatanController::class, 'create'])->name('form-pembuatan.create');
Route::post('/store', [FormPembuatanController::class, 'store'])->name('form-pembuatan.store');
Route::get('/index', [FormPembuatanController::class, 'index'])->name('form-pembuatan.index');
Route::get('/edit/{id}', [FormPembuatanController::class, 'edit'])->name('form-pembuatan.edit');
Route::put('/update/{id}', [FormPembuatanController::class, 'update'])->name('form-pembuatan.update');
Route::delete('/destroy/{id}', [FormPembuatanController::class, 'destroy'])->name('form-pembuatan.destroy');
Route::put('/update-status/{id}', [FormPembuatanController::class, 'updateStatus'])->name('update-status');
Route::post('/update-status-by-year', [FormPembuatanController::class, 'updateStatusByYear'])->name('update.status.by.year');
});


Route::prefix('group')->name('group.')->group(function () {
    Route::get('/', [FormGrup::class, 'index'])->name('index');
    Route::get('/create', [FormGrup::class, 'create'])->name('create');
    Route::post('/store', [FormGrup::class, 'store'])->name('store');
    Route::get('/edit/{id}', [FormGrup::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [FormGrup::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [FormGrup::class, 'destroy'])->name('destroy');
});

>>>>>>> Stashed changes
