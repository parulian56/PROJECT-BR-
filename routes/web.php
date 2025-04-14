<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\KesehatandankebersihanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiKasirController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// ==========================
// Rute Transaksi untuk User
// ==========================
Route::resource('user/transaksi', TransaksiKasirController::class);
Route::delete('user/transaksi', [TransaksiKasirController::class, 'hapusSemua'])->name('transaksi.hapusSemua');

// ==========================
// Rute Data untuk Admin
// ==========================
Route::resource('admin/data', DataController::class);

// Kategori Makanan
Route::get('admin/data/kategori/makanan/index', [DataController::class, 'makanan'])->name('admin.data.kategori.makanan');

// Kategori Minuman
Route::get('admin/data/kategori/minuman/index', [DataController::class, 'minuman'])->name('admin.data.kategori.minuman');

// Kategori Alat Tulis
Route::get('admin/data/kategori/alat_tulis/index', [DataController::class, 'alat_tulis'])->name('admin.data.kategori.alat_tulis');

// Kategori Seragam
Route::get('admin/data/kategori/seragam/index', [DataController::class, 'seragam'])->name('admin.data.kategori.seragam');

// Kategori Kesehatan dan Kebersihan
Route::prefix('admin/data/kategori/kesehatandankebersihan')->name('admin.data.kategori.kesehatandankebersihan.')->group(function () {
    Route::get('/', [KesehatandankebersihanController::class, 'kesehatandankebersihan'])->name('index');
    Route::get('/create', [KesehatandankebersihanController::class, 'create'])->name('create');
});

// Kategori Lainnya
Route::get('admin/data/kategori/lainya/index', [DataController::class, 'lainya'])->name('admin.data.kategori.lainya');

// ==========================
// Dashboard Admin
// ==========================
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
