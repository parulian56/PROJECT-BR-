<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    DataController,
    MakananController,
    KesehatandankebersihanController,
    DashboardController,
    TransaksiKasirController,
    ReportController,
    LainyaController,

};

// Public Routes
Route::view('/', 'dashboard');

// LOGIN ROUTE
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', fn () => redirect('/login'));

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Dashboard Routes
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


    // Profile Routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // User Transaction Routes
    Route::controller(TransaksiKasirController::class)->prefix('user/transaksi')->group(function () {
        Route::get('/', 'index')->name('transaksi.index');
        Route::get('/create', 'create')->name('transaksi.create');
        Route::post('/', 'store')->name('transaksi.store');
        Route::get('/{transaksi}', 'show')->name('transaksi.show');
        Route::get('/{transaksi}/edit', 'edit')->name('transaksi.edit');
        Route::put('/{transaksi}', 'update')->name('transaksi.update');
        Route::delete('/{transaksi}', 'destroy')->name('transaksi.destroy');
        Route::delete('/', 'hapusSemua')->name('transaksi.hapusSemua');
    });

    // Admin Data Routes
    Route::controller(DataController::class)->prefix('admin/data')->group(function () {
        Route::get('/', 'index')->name('data.index');
        Route::get('/create', 'create')->name('data.create');
        Route::post('/', 'store')->name('data.store');
        Route::get('/{data}', 'show')->name('data.show');
        Route::get('/{data}/edit', 'edit')->name('data.edit');
        Route::put('/{data}', 'update')->name('data.update');
        Route::delete('/{data}', 'destroy')->name('data.destroy');

        // Category Routes
        Route::prefix('kategori')->group(function () {
            // Food Routes
            Route::controller(MakananController::class)->prefix('makanan')->group(function () {
                Route::get('/', 'index')->name('admin.data.kategori.makanan.index');
                Route::get('/create', 'create')->name('admin.data.kategori.makanan.create');
                Route::post('/', 'store')->name('admin.data.kategori.makanan.store');   
                Route::get('{makanan}/edit', 'edit')->name('admin.data.kategori.makanan.edit');
                Route::put('{makanan}', 'update')->name('admin.data.kategori.makanan.update');
                Route::delete('{makanan}', 'destroy')->name('admin.data.kategori.makanan.destroy');
            });

            // Other Categories
            Route::get('minuman', 'minuman')->name('admin.data.kategori.minuman');
            Route::get('alat_tulis', 'alat_tulis')->name('admin.data.kategori.alat_tulis');
            Route::get('seragam', 'seragam')->name('admin.data.kategori.seragam');
            Route::get('lainya', 'lainya')->name('admin.data.kategori.lainya');

            // Health & Hygiene
            Route::prefix('lainya')->name('lainya.')->group(function() {
                Route::get('/index', [LainyaController::class, 'index'])->name('index');
                Route::get('/create', [LainyaController::class, 'create'])->name('create');
                Route::post('/store', [LainyaController::class, 'store'])->name('store');
                Route::get('/{id}/show', [LainyaController::class, 'show'])->name('show');
                Route::get('/{id}/edit', [LainyaController::class, 'edit'])->name('edit');
                Route::put('/{id}/update', [LainyaController::class, 'update'])->name('update');
                Route::delete('/{id}/destroy', [LainyaController::class, 'destroy'])->name('destroy');
            });
        });
    });
});

require __DIR__.'/auth.php';
