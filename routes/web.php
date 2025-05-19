<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Auth\AuthenticatedSessionController,
    ProfileController,
    DataController,
    KesehatandankebersihanController,
    MakananController,
    DashboardController,
    TransaksiKasirController,
    LainyaController,
    MinumanController,
    AlattulisController,
    ReportController // <- Tambahkan controller Report
};

// ======================
// PUBLIC ROUTES
// ======================
Route::get('/', fn () => redirect('/login'));

// Halaman login untuk user yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

// Logout (hanya bisa diakses kalau sudah login)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// ======================
// AUTHENTICATED ROUTES
// ======================
Route::middleware('auth')->group(function () {

    // Dashboard setelah login
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ----------------------
    // Profile User
    // ----------------------
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // ----------------------
    // TRANSAKSI
    // ----------------------
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

    // ----------------------
    // ADMIN REPORT (FIX ERROR)
    // ----------------------
    Route::get('/admin/reports', [ReportController::class, 'index'])->name('admin.reports');

    // ----------------------
    // ADMIN DATA ROUTES
    // ----------------------
    Route::prefix('admin/data')->name('admin.data.')->group(function () {

        Route::get('/', [DataController::class, 'index'])->name('index');

        // --- KATEGORI ---
        Route::prefix('kategori')->name('kategori.')->group(function () {

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

            // Kategori lain (pakai DataController)
            Route::resource('minuman', MinumanController::class)->names([
                'index'   => 'minuman.index',
                'create'  => 'minuman.create',
                'store'   => 'minuman.store',
                'show'    => 'minuman.show',
                'edit'    => 'minuman.edit',
                'update'  => 'minuman.update',
                'destroy' => 'minuman.destroy',
            ]);

              Route::resource('alattulis', AlattulisController::class)->names([
                'index' => 'alattulis.index',
                'create' => 'alattulis.create',
                'show' => 'alattulis.show',
                'store' => 'alattulis.store',
                'edit' => 'alattulis.edit',
                'update' => 'alattulis.update',
                'destroy' => 'alattulis.destroy'
                ]);
            Route::get('seragam', [DataController::class, 'seragam'])->name('seragam');

            // Kategori lainya (pakai controller sendiri)
            Route::resource('lainya', LainyaController::class)->names([
                    'index' => 'lainya.index',
                    'create' => 'lainya.create',
                    'show' => 'lainya.show',
                    'store' => 'lainya.store',
                    'edit' => 'lainya.edit',
                    'update' => 'lainya.update',
                    'destroy' => 'lainya.destroy'
                ]);
        });

        // --- INVENTORY ---
        Route::prefix('inventory')->name('inventory.')->group(function () {
            Route::get('/report', [DataController::class, 'inventoryReport'])->name('report');
            Route::get('/export', [DataController::class, 'exportInventory'])->name('export');
        });
    });
});

// Wajib ada jika kamu pakai Laravel Breeze / Fortify
require __DIR__.'/auth.php';
