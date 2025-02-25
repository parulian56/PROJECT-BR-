<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\KesehatandankebersihanController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rute transaksi untuk user (dengan prefix 'user')
use App\Http\Controllers\TransaksiKasirController; // Menyesuaikan dengan folder

Route::resource('user/transaksi', TransaksiKasirController::class);
Route::delete('user/transaksi', [TransaksiKasirController::class, 'hapusSemua'])->name('transaksi.hapusSemua');

// Rute Data untuk admin
Route::resource('admin/data', DataController::class);

Route::get('admin/kategori/makanan/index', [DataController::class, 'makanan'])->name('admin.data.kategori.makanan');

Route::get('admin/kategori/minuman/index', [DataController::class, 'minuman'])->name('admin.data.kategori.minuman');

Route::get('admin/kategori/alat_tulis/index', [DataController::class, 'alat_tulis'])->name('admin.data.kategori.alat_tulis');

Route::get('admin/kategori/seragam/index', [DataController::class, 'seragam'])->name('admin.data.kategori.seragam');

Route::prefix('admin/kategori/kesehatandankebersihan')->name('admin.data.kategori.kesehatandankebersihan.')->group(function () {
    Route::get('/', [KesehatandankebersihanController::class, 'kesehatandankebersihan'])->name('index');
    Route::get('/create', [KesehatandankebersihanController::class, 'create'])->name('create');
});


Route::get('admin/kategori/lainya/index', [DataController::class, 'lainya'])->name('admin.data.kategori.lainya');
// Rute kategori

// Dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
