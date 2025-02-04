<?php
use App\Http\Controllers\MuridController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('data', DataController::class);
Route::resource('main', MainController::class);
Route::resource('report', MainController::class);
Route::resource('murid', MainController::class);