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
Route::middleware('auth')->group(function () {});
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

// Group route untuk admin/data
            Route::prefix('data')->name('admin.data.')->group(function () {
                Route::get('/', [DataController::class, 'index'])->name('index');         // Menampilkan semua data
                Route::get('/create', [DataController::class, 'create'])->name('create'); // Form tambah data
                Route::post('/', [DataController::class, 'store'])->name('store');        // Proses simpan data baru
                Route::get('/{id}/edit', [DataController::class, 'edit'])->name('edit');  // Form edit data
                Route::put('/{id}', [DataController::class, 'update'])->name('update');   // Proses update data
                Route::delete('/{id}', [DataController::class, 'destroy'])->name('destroy'); // Proses hapus d
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


