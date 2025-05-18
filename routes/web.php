<?php
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\{
    Auth\AuthenticatedSessionController,
    ProfileController,
    DataController,
    MakananController,
    DashboardController,
    TransaksiKasirController,
    ReportController,
   
};

// Public Routes
Route::view('/', 'login');

// LOGIN ROUTE
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', fn () => redirect('/login'));

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // USER - Dashboard & Profile
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

    
    // Profile Routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // USER - Transaksi Kasir
    Route::prefix('user/transaksi')->name('transaksi.')->group(function () {
        Route::get('/', [TransaksiKasirController::class, 'index'])->name('index');
        Route::get('/create', [TransaksiKasirController::class, 'create'])->name('create');
        Route::post('/', [TransaksiKasirController::class, 'store'])->name('store');
        Route::get('/{transaksi}', [TransaksiKasirController::class, 'show'])->name('show');
        Route::get('/{transaksi}/edit', [TransaksiKasirController::class, 'edit'])->name('edit');
        Route::put('/{transaksi}', [TransaksiKasirController::class, 'update'])->name('update');
        Route::delete('/{transaksi}', [TransaksiKasirController::class, 'destroy'])->name('destroy');
        Route::delete('/', [TransaksiKasirController::class, 'hapusSemua'])->name('hapusSemua');
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
