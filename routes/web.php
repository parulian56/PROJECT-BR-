<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    DataController,
    KesehatandankebersihanController,
    MakananController,
    DashboardController,
    TransaksiKasirController,
    LainyaController
};

use App\Http\Controllers\Auth\AuthenticatedSessionController;

// ======================
// PUBLIC ROUTES
// ======================
Route::get('/', fn () => redirect('/login'));

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// ======================
// AUTHENTICATED ROUTES
// ======================
Route::middleware('auth')->group(function () {
    // Dashboard Route
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // ======================
    // TRANSACTION ROUTES
    // ======================
    Route::prefix('transaksi')->name('transaksi.')->controller(TransaksiKasirController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{transaksi}', 'show')->name('show');
        Route::get('/{transaksi}/edit', 'edit')->name('edit');
        Route::put('/{transaksi}', 'update')->name('update');
        Route::delete('/{transaksi}', 'destroy')->name('destroy');
        Route::delete('/', 'hapusSemua')->name('hapusSemua');
    });

    // ======================
    // ADMIN DATA ROUTES
    // ======================
    Route::prefix('admin/data')->name('admin.data.')->group(function () {

        // Admin Data Index
        Route::get('/', [DataController::class, 'index'])->name('index');

        // ----------------------
        // KATEGORI SECTION
        // ----------------------
        Route::prefix('kategori')->name('kategori.')->group(function () {

            // Makanan Resource
            Route::resource('makanan', MakananController::class)->names([
                'index' => 'makanan.index',
                'create' => 'makanan.create',
                'store' => 'makanan.store',
                'show' => 'makanan.show',
                'edit' => 'makanan.edit',
                'update' => 'makanan.update',
                'destroy' => 'makanan.destroy'
            ]);


            Route::resource('kesehatandankebersihan', KesehatandankebersihanController::class)->names([
                'index'   => 'kesehatandankebersihan.index',
                'create'  => 'kesehatandankebersihan.create',
                'store'   => 'kesehatandankebersihan.store',
                'show'    => 'kesehatandankebersihan.show',
                'edit'    => 'kesehatandankebersihan.edit',
                'update'  => 'kesehatandankebersihan.update',
                'destroy' => 'kesehatandankebersihan.destroy',
            ]);

            // Kategori Lain (masih pakai DataController)
            Route::get('minuman', [DataController::class, 'minuman'])->name('minuman');
            Route::get('alat_tulis', [DataController::class, 'alat_tulis'])->name('alat_tulis');
            Route::get('seragam', [DataController::class, 'seragam'])->name('seragam');

            // Lainya (pakai controller terpisah)
                Route::resource('lainya', LainyaController::class)->names([
                    'index' => 'lainya.index',
                    'create' => 'lainya.create',
                    'store' => 'lainya.store',
                    'edit' => 'lainya.edit',
                    'update' => 'lainya.update',
                    'destroy' => 'lainya.destroy'
                ]);
        });

        // ----------------------
        // INVENTORY SECTION
        // ----------------------
        Route::prefix('inventory')->name('inventory.')->group(function () {
            Route::get('/report', [DataController::class, 'inventoryReport'])->name('report');
            Route::get('/export', [DataController::class, 'exportInventory'])->name('export');
        });
    });
});

require __DIR__.'/auth.php';
