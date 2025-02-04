<?php
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('data', DataController::class);
Route::resource('App', AppController::class);
Route::resource('report', ReportController::class);



Route::resource('transaksi', TransaksiController::class);
