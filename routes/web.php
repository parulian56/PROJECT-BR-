<?php

use App\Http\Controllers\DataController;
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

// Dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
