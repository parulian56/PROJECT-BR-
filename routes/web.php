<?php

use App\Http\Controllers\TransaksiKasirController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rute transaksi
Route::resource('transaksi', TransaksiKasirController::class);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
