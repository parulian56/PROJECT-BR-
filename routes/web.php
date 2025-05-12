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
};

// Public Routes
Route::view('/', 'dashboard');



Route::get('/admin/reports', [ReportController::class, 'index'])->name('admin.reports');


// LOGIN ROUTE
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']); // Handle submit login
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Handle logout


// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Dashboard Routes
    Route::view('admin/dashboard', 'dashboard')->name('dashboard');
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    
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
                Route::get('index', 'index')->name('admin.data.kategori.makanan.index');
                Route::get('create', 'create')->name('admin.data.kategori.makanan.create');
                Route::post('/', 'store')->name('admin.data.kategori.makanan.store');
                Route::get('{id}/edit', 'edit')->name('admin.data.kategori.makanan.edit');
                Route::put('{id}', 'update')->name('admin.data.kategori.makanan.update');
                Route::delete('{id}', 'destroy')->name('admin.data.kategori.makanan.destroy');
            });

            // Other Categories
            Route::get('minuman', 'minuman')->name('admin.data.kategori.minuman');
            Route::get('alat_tulis', 'alat_tulis')->name('admin.data.kategori.alat_tulis');
            Route::get('seragam', 'seragam')->name('admin.data.kategori.seragam');
            Route::get('lainya', 'lainya')->name('admin.data.kategori.lainya');

            // Health & Hygiene
            Route::controller(KesehatandankebersihanController::class)
                 ->prefix('kesehatandankebersihan')
                 ->group(function () {
                Route::get('/', 'kesehatandankebersihan')->name('admin.data.kategori.kesehatandankebersihan.index');
                Route::get('create', 'create')->name('admin.data.kategori.kesehatandankebersihan.create');
            });
        });
        //admin report

        // Di bawah group utama admin, setelah definisi route admin/data
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    // Laporan
    Route::get('reports', [ReportController::class, 'index'])->name('reports');
    Route::get('reports/daily', [ReportController::class, 'daily'])->name('reports.daily');
Route::get('/reports/weekly', [ReportController::class, 'weekly'])->name('admin.reports.weekly');    Route::get('reports/monthly', [ReportController::class, 'monthly'])->name('reports.monthly');
    Route::get('reports/yearly', [ReportController::class, 'yearly'])->name('reports.yearly');
});

        
        Route::prefix('admin')->middleware(['auth'])->group(function () {
            // Route untuk menampilkan laporan transaksi
        Route::get('/admin/reports', [ReportController::class, 'index'])->name('admin.reports.index')->middleware('auth');
            Route::get('/reports/daily', [ReportController::class, 'daily'])->name('admin.reports.daily');
            Route::get('admin/reports/weekly', [ReportController::class, 'weekly'])->name('admin.reports.weekly');


        });
    });
});

require __DIR__.'/auth.php';
