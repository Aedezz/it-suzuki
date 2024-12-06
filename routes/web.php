<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\Activity;
use App\Http\Controllers\FormGrup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\Cpembuatan;
use App\Http\Controllers\PerbaikanController;
use App\Http\Controllers\FormPerbaikanController;
use App\Http\Controllers\ChecklistPerbaikanController;
use App\Http\Controllers\LaporanPerbaikanController;
use App\Http\Controllers\PeriodePerbaikanController;
use App\Http\Controllers\DeskripsiPerbaikanController;
use App\Http\Controllers\ItemPerbaikanController;
use App\Http\Controllers\HistoryPerbaikanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Branch;
use App\Http\Controllers\FormPembuatanController;
use App\Http\Controllers\Ceklist;
use App\Http\Controllers\FormPc;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\Komputer;
use App\Http\Controllers\Laporan;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\ProblemController;

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

// ROUTE GENERAL PERIODE
// Menampilkan daftar periode perbaikan
Route::get('/general/periode', [PeriodePerbaikanController::class, 'index'])->name('periode.index');
// Menampilkan form untuk membuat periode perbaikan baru
Route::get('/general/periode/create', [PeriodePerbaikanController::class, 'create'])->name('periode.create');
// Menyimpan periode perbaikan baru
Route::post('/general/periode', [PeriodePerbaikanController::class, 'store'])->name('periode.store');
// Menampilkan form untuk mengedit periode perbaikan yang sudah ada
Route::get('/general/periode/{id_periode}/edit', [PeriodePerbaikanController::class, 'edit'])->name('periode.edit');
// Memperbarui periode perbaikan yang sudah ada
Route::put('/general/periode/{id_periode}', [PeriodePerbaikanController::class, 'update'])->name('periode.update');
// Menghapus periode perbaikan
Route::delete('/general/periode/{id_periode}', [PeriodePerbaikanController::class, 'destroy'])->name('periode.destroy');

// ROUTE GENERAL DESKRIPSI
// Menampilkan daftar deskripsi perbaikan
Route::get('/general/deskripsi', [DeskripsiPerbaikanController::class, 'index'])->name('deskripsi.index');
Route::get('/general/deskripsi/filter', [DeskripsiPerbaikanController::class, 'filter'])->name('deskripsi.filter');
// Menampilkan form untuk membuat periode perbaikan baru
Route::get('/deskripsi/create', [DeskripsiPerbaikanController::class, 'create'])->name('deskripsi.create');
// Menyimpan Deskripsi perbaikan baru
Route::post('/general/deskripsi', [DeskripsiPerbaikanController::class, 'store'])->name('deskripsi.store');
Route::get('/general/deskripsi/{id_deskripsi}/edit', [DeskripsiPerbaikanController::class, 'edit'])->name('deskripsi.edit');
Route::put('/general/deskripsi/{id_deskripsi}', [DeskripsiPerbaikanController::class, 'update'])->name('deskripsi.update');
Route::delete('/general/deskripsi/{id_deskripsi}', [DeskripsiPerbaikanController::class, 'destroy'])->name('deskripsi.destroy');

// Services Item
Route::get('/services/item', [ItemPerbaikanController::class, 'index'])->name('item.index');
// Menampilkan form untuk membuat periode perbaikan baru
Route::get('/services/create', [ItemPerbaikanController::class, 'create'])->name('item.create');
// Menyimpan Deskripsi perbaikan baru
Route::post('/services/item', [ItemPerbaikanController::class, 'store'])->name('item.store');
Route::get('/services/item/{id}/edit', [ItemPerbaikanController::class, 'edit'])->name('item.edit');
Route::put('/services/item/{id}', [ItemPerbaikanController::class, 'update'])->name('item.update');

//HISTORI ROUTE PERBAIKAN
Route::get('/services/history', [HistoryPerbaikanController::class, 'index'])->name('history.index');
// Route untuk form create (GET)
Route::get('/services/history/create', [HistoryPerbaikanController::class, 'create'])->name('services.history.create');

// Route untuk menghandle POST (auto-live atau pengiriman data)
Route::post('/services/history/store', [HistoryPerbaikanController::class, 'store'])->name('services.history.store');
Route::get('/search-pegawai', [HistoryPerbaikanController::class, 'searchPegawai']);
///////////////////////////





// Route pembuatan
Route::view('/pembuatan-user', 'form-db/pembuatan')->name('pembuatan-user');
Route::get('/pembuatan/create', [Cpembuatan::class, 'create'])->name('pembuatan.create');
Route::post('/pembuatan/store', [Cpembuatan::class, 'store'])->name('pembuatan.store');
Route::get('/view/{id}', [Cpembuatan::class, 'viewdata'])->name('viewdata');

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


//Route Activity
Route::get('activity-page', [Activity::class, 'index'])->name('home-activity');
Route::delete('/delete-activity/{id}', [Activity::class, 'destroy'])->name('activity.destroy');
Route::get('/edit-activity/{id}', [Activity::class, 'edit'])->name('activity.edit');
Route::put('/update-activity/{id}', [Activity::class, 'update'])->name('activity.update');
Route::get('/add-activity', [Activity::class, 'create'])->name('activity.create');
Route::post('/store-activity', [Activity::class, 'store'])->name('activity.store');Route::prefix('/form-pembuatan')->group(function() {
Route::get('/create', [FormPembuatanController::class, 'create'])->name('form-pembuatan.create');
Route::post('/store', [FormPembuatanController::class, 'store'])->name('form-pembuatan.store');
Route::get('/index', [FormPembuatanController::class, 'index'])->name('form-pembuatan.index');
Route::get('/edit/{id}', [FormPembuatanController::class, 'edit'])->name('form-pembuatan.edit');
Route::put('/update/{id}', [FormPembuatanController::class, 'update'])->name('form-pembuatan.update');
Route::delete('/destroy/{id}', [FormPembuatanController::class, 'destroy'])->name('form-pembuatan.destroy');
Route::put('/form-pembuatan/update-status/{id}', [FormPembuatanController::class, 'updateStatus'])->name('form-pembuatan.updateStatus');
Route::post('/update-status-batch', [FormPembuatanController::class, 'updateStatusBatch'])->name('form-pembuatan.updateStatusBatch');
});// Route Form Dalam Installasi Pc
Route::get('form-pc', [FormPc::class, 'form'])->name('table');
Route::delete('/delete-form/{id}', [FormPc::class, 'destroy'])->name('pc.destroy');
Route::post('/pc/check/{id}', [FormPc::class, 'check'])->name('pc.check');
Route::get('/pc/print/{id}', [FormPc::class, 'print'])->name('form_pc.print');

//Route Laporan Installasi Pc
Route::get('form-laporan', [Laporan::class, 'index'])->name('laporan');

//Route Ceklist Installasi Pc
Route::get('form-ceklist', [Ceklist::class, 'index'])->name('ceklist');

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

Route::prefix('modul')->name('modul.')->group(function () {
    Route::get('/', [ModulController::class, 'index'])->name('index'); // Menampilkan daftar modul
    Route::get('/create', [ModulController::class, 'create'])->name('create'); // Form tambah modul
    Route::post('/', [ModulController::class, 'store'])->name('store'); // Proses tambah modul
    Route::get('/{id_modul}/edit', [ModulController::class, 'edit'])->name('edit'); // Form edit modul
    Route::put('/{id_modul}', [ModulController::class, 'update'])->name('update'); // Proses update modul
    Route::delete('/{id_modul}', [ModulController::class, 'destroy'])->name('destroy'); // Proses hapus modul
});

Route::prefix('barang')->name('barang.')->group(function () {
    Route::get('/', [BarangController::class, 'index'])->name('index'); // Menampilkan daftar modul
    Route::get('/create', [BarangController::class, 'create'])->name('create'); // Form tambah modul
    Route::post('/store', [BarangController::class, 'store'])->name('store'); // Proses tambah modul
    Route::get('/{id}/edit', [BarangController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [BarangController::class, 'update'])->name('update'); // Proses update modul
});

//Route Branch
Route::get('form-branch', [Branch::class, 'index'])->name('branch');
Route::delete('/delete-branch/{id}', [Branch::class, 'destroy'])->name('branch.destroy');
Route::get('/edit-branch/{id}', [Branch::class, 'edit'])->name('branch.edit');
Route::put('/update-branch/{id}', [Branch::class, 'update'])->name('branch.update');
Route::get('/add-branch', [Branch::class, 'create'])->name('branch.create');
Route::post('/store-branch', [Branch::class, 'store'])->name('branch.store');

//Route Service Komputer
Route::get('form-komputer', [Komputer::class, 'index'])->name('komputer');
Route::get('form-detail', [Komputer::class, 'detail'])->name('komputer.detail');
Route::get('/add-komputer', [Komputer::class, 'create'])->name('komputer.create');
Route::post('/store-komputer', [Komputer::class, 'store'])->name('komputer.store');
Route::get('/detail-komputer/{id}', [Komputer::class, 'detail'])->name('komputer.detail');
Route::put('/update-komputer/{id}', [Komputer::class, 'update'])->name('komputer.update');
Route::delete('/delete-komputer/{id}', [Komputer::class, 'destroy'])->name('komputer.destroy');
Route::get('/search-users', [Komputer::class, 'search']);

Route::prefix('problem')->name('problem.')->group(function () {
    Route::get('/', [ProblemController::class, 'index'])->name('index');
    Route::get('create', [ProblemController::class, 'create'])->name('create');
    Route::post('store', [ProblemController::class, 'store'])->name('store');
});

Route::get('/information',[InformationController::class,'show'])->name('branch-info');

Route::middleware(['auth'])->group(function () {
    Route::get('/logbook', [LogbookController::class, 'index'])->name('logbook.index');
    Route::get('/logbook/create', [LogbookController::class, 'create'])->name('logbook.create');
    Route::post('/logbook', [LogbookController::class, 'store'])->name('logbook.store');
    Route::delete('/logbook/{id}', [LogbookController::class, 'destroy'])->name('logbook.destroy');
});