<?php
 use Illuminate\Support\Facades\Route;

 // Halaman Welcome
 Route::get('/', function () {
     return view('welcome');
 })->name('welcome');
 
 // Halaman Kasir
