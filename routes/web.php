<?php
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('data', DataController::class);
Route::resource('main', MainController::class);
Route::resource('report', ReportController::class);
Route::resource('database', DatabaseController::class);


DB::table('data')->get();
DB::table('main')->get();
DB::table('report')->get();
DB::table('database')->get();
