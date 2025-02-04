<?php
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('data', DataController::class);
Route::resource('report', ReportController::class);



Route::resource('transaksi', TransaksiController::class);
use App\Http\Controllers\DashboardController;

// Menyambungkan URL ke controller yang benar
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


