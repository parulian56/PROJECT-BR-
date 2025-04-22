<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\KesehatandankebersihanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiKasirController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Transaksi User
Route::resource('user/transaksi', TransaksiKasirController::class);
Route::delete('user/transaksi', [TransaksiKasirController::class, 'hapusSemua'])->name('transaksi.hapusSemua');

// Data Resource
Route::resource('admin/data', DataController::class);

// Kategori per jenis (pastikan nama route sesuai yang dipanggil)

Route::prefix('admin/data/kategori/makanan')->name('admin.data.kategori.makanan.')->group(function () {
    Route::get('/index', [MakananController::class, 'index'])->name('index');
    Route::get('/create', [MakananController::class, 'create'])->name('create');
    Route::post('/', [MakananController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [MakananController::class, 'edit'])->name('edit');
    Route::put('/{id}', [MakananController::class, 'update'])->name('update');
    Route::delete('/{id}', [MakananController::class, 'destroy'])->name('destroy');
});


Route::get('admin/data/kategori/minuman', [DataController::class, 'minuman'])->name('admin.data.kategori.minuman');
Route::get('admin/data/kategori/alat_tulis', [DataController::class, 'alat_tulis'])->name('admin.data.kategori.alat_tulis');
Route::get('admin/data/kategori/seragam', [DataController::class, 'seragam'])->name('admin.data.kategori.seragam');
Route::get('admin/data/kategori/lainya', [DataController::class, 'lainya'])->name('admin.data.kategori.lainya');

// Kesehatan & Kebersihan (pakai grup prefix dan name)
Route::prefix('admin/data/kategori/kesehatandankebersihan')->name('admin.data.kategori.kesehatandankebersihan.')->group(function () {
    Route::get('/', [KesehatandankebersihanController::class, 'kesehatandankebersihan'])->name('index');
    Route::get('/create', [KesehatandankebersihanController::class, 'create'])->name('create');
});

// Dashboard Admin
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Dashboard User Biasa
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';