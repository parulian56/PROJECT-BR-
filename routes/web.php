<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\{
    Auth\AuthenticatedSessionController,
    ProfileController,
    DataController,
    MakananController,
    DashboardController,
    TransaksiKasirController,
    KesehatandankebersihanController,
    MinumanController,
    AlattulisController,
    ReportController,
    LainyaController,
    SeragamController,
    UserController,
};
use Illuminate\Support\Facades\Route;

// Redirect user berdasarkan role saat akses root '/'
Route::get('/', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    return redirect()->intended(
        auth()->user()->role === 'admin'
            ? route('admin.dashboard')
            : route('transaksi.index')
    );
});

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Profile Routes (semua user)
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // USER Routes (role = user)
    Route::middleware('role:user')->group(function () {
        Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

        Route::prefix('transaksi')->name('transaksi.')->group(function () {
            Route::get('/', [TransaksiKasirController::class, 'index'])->name('index');
            Route::get('/create', [TransaksiKasirController::class, 'create'])->name('create');
            Route::post('/', [TransaksiKasirController::class, 'store'])->name('store');
            Route::get('/{transaksi}', [TransaksiKasirController::class, 'show'])->name('show');
            Route::get('/{transaksi}/edit', [TransaksiKasirController::class, 'edit'])->name('edit');
            Route::put('/{transaksi}', [TransaksiKasirController::class, 'update'])->name('update');
            Route::delete('/delete-all', [TransaksiKasirController::class, 'deleteAll'])->name('deleteAll');
            Route::delete('/{transaksi}', [TransaksiKasirController::class, 'destroy'])->name('destroy');
            Route::post('/checkout', [TransaksiKasirController::class, 'checkout'])->name('checkout');
        });
    });

    // ADMIN Routes (role = admin)
    Route::prefix('admin')
        ->middleware('role:admin')
        ->name('admin.')
        ->group(function () {

            // Dashboard Admin
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

            // Admin Data Routes (prefix admin/data)
            Route::prefix('data')
                ->name('data.')
                ->group(function () {
                    // Route ke DataController@index untuk /admin/data
                    Route::get('/', [DataController::class, 'index'])->name('index');

                    // Subkategori kategori
                    Route::prefix('kategori')->name('kategori.')->group(function () {
                        Route::resource('makanan', MakananController::class)->names([
                            'index' => 'makanan.index',
                            'create' => 'makanan.create',
                            'store' => 'makanan.store',
                            'show' => 'makanan.show',
                            'edit' => 'makanan.edit',
                            'update' => 'makanan.update',
                            'destroy' => 'makanan.destroy',
                        ]);
                        Route::resource('minuman', MinumanController::class)->names([
                            'index' => 'minuman.index',
                            'create' => 'minuman.create',
                            'store' => 'minuman.store',
                            'show' => 'minuman.show',
                            'edit' => 'minuman.edit',
                            'update' => 'minuman.update',
                            'destroy' => 'minuman.destroy',
                        ]);
                        Route::resource('alattulis', AlattulisController::class)->names([
                            'index' => 'alattulis.index',
                            'create' => 'alattulis.create',
                            'store' => 'alattulis.store',
                            'show' => 'alattulis.show',
                            'edit' => 'alattulis.edit',
                            'update' => 'alattulis.update',
                            'destroy' => 'alattulis.destroy',
                        ]);
                        Route::resource('seragam', SeragamController::class)->names([
                            'index' => 'seragam.index',
                            'create' => 'seragam.create',
                            'store' => 'seragam.store',
                            'show' => 'seragam.show',
                            'edit' => 'seragam.edit',
                            'update' => 'seragam.update',
                            'destroy' => 'seragam.destroy',
                        ]);
                        Route::resource('kesehatandankebersihan', KesehatandankebersihanController::class)->names([
                            'index' => 'kesehatandankebersihan.index',
                            'create' => 'kesehatandankebersihan.create',
                            'store' => 'kesehatandankebersihan.store',
                            'show' => 'kesehatandankebersihan.show',
                            'edit' => 'kesehatandankebersihan.edit',
                            'update' => 'kesehatandankebersihan.update',
                            'destroy' => 'kesehatandankebersihan.destroy',
                        ]);
                        Route::resource('lainya', LainyaController::class)->names([
                            'index' => 'lainya.index',
                            'create' => 'lainya.create',
                            'store' => 'lainya.store',
                            'show' => 'lainya.show',
                            'edit' => 'lainya.edit',
                            'update' => 'lainya.update',
                            'destroy' => 'lainya.destroy',
                        ]);
                    });
                });

            // User Management
            Route::get('/users', [UserController::class, 'index'])->name('users.index');

            // Reports
            Route::prefix('reports')->name('reports.')->group(function () {
                Route::get('/', [ReportController::class, 'index'])->name('index');
                Route::get('/daily', [ReportController::class, 'daily'])->name('daily');
                Route::get('/weekly', [ReportController::class, 'weekly'])->name('weekly');
                Route::get('/monthly', [ReportController::class, 'monthly'])->name('monthly');
                Route::get('/yearly', [ReportController::class, 'yearly'])->name('yearly');
                Route::get('/custom', [ReportController::class, 'custom'])->name('custom');
            });
        });
});