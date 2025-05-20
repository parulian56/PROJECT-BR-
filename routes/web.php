<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\{
    Auth\AuthenticatedSessionController,
    ProfileController,
    DataController,
    MakananController,
    DashboardController,
    TransaksiKasirController,
    KesehatandankebebersihanController,
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

    // Profile Routes (untuk semua user)
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // USER Routes
    Route::middleware(['role:user'])->group(function () {
        // Dashboard User
        Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

        // Transaksi Kasir
        Route::prefix('transaksi')->name('transaksi.')->group(function () {
            Route::get('/', [TransaksiKasirController::class, 'index'])->name('index');
            Route::get('/create', [TransaksiKasirController::class, 'create'])->name('create');
            Route::post('/', [TransaksiKasirController::class, 'store'])->name('store');
            Route::get('/{transaksi}', [TransaksiKasirController::class, 'show'])->name('show');
            Route::get('/{transaksi}/edit', [TransaksiKasirController::class, 'edit'])->name('edit');
            Route::put('/{transaksi}', [TransaksiKasirController::class, 'update'])->name('update');
            Route::delete('/{transaksi}', [TransaksiKasirController::class, 'destroy'])->name('destroy');
            Route::delete('/transaksi/clear', [TransaksiKasirController::class, 'clearAll'])->name('transaksi.clearAll');
            Route::post('/checkout', [TransaksiKasirController::class, 'checkout'])->name('checkout');
        });
    });

    // ADMIN - Hanya untuk role admin
    Route::prefix('admin')->middleware(['role:admin'])->name('admin.')->group(function () {
        Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');
        Route::get('/users', [UserController::class, 'index'])->name('users');
          Route::get('/reports', [ReportController::class, 'index'])->name('reports');

        Route::prefix('admin/data')->name('admin.data.')->group(function () {

        Route::get('/', [DataController::class, 'index'])->name('index');

        
        // Admin Data Routes
       Route::controller(DataController::class)->prefix('admin/data')->group(function () {
       Route::get('/', 'index')->name('data.index');
});

        
    });


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

                    Route::resource('minuman', MinumanController::class)->names([
                        'index' => 'minuman.index',
                        'create' => 'minuman.create',
                        'store' => 'minuman.store',
                        'show' => 'minuman.show',
                        'edit' => 'minuman.edit',
                        'update' => 'minuman.update',
                        'destroy' => 'minuman.destroy'
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
        });
    });

