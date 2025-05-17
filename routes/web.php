<?php
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\{
    Auth\AuthenticatedSessionController,
    ProfileController,
    DataController,
    MakananController,
    KesehatandankebersihanController,
    DashboardController,
    TransaksiKasirController,
    ReportController,
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

    // USER - Dashboard & Profile
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
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

    // ADMIN - Hanya untuk role admin
    Route::prefix('admin')->middleware(['role:admin'])->name('admin.')->group(function () {
        Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');
        Route::get('/users', [UserController::class, 'index'])->name('users');

        // DATA MASTER
        Route::prefix('data')->name('data.')->group(function () {
            Route::controller(DataController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{data}', 'show')->name('show');
                Route::get('/{data}/edit', 'edit')->name('edit');
                Route::put('/{data}', 'update')->name('update');
                Route::delete('/{data}', 'destroy')->name('destroy');
            });

            // KATEGORI MAKANAN
            Route::prefix('kategori/makanan')->name('kategori.makanan.')->group(function () {
                Route::get('index', [MakananController::class, 'index'])->name('index');
                Route::get('create', [MakananController::class, 'create'])->name('create');
                Route::post('/', [MakananController::class, 'store'])->name('store');
                Route::get('{id}/edit', [MakananController::class, 'edit'])->name('edit');
                Route::put('{id}', [MakananController::class, 'update'])->name('update');
                Route::delete('{id}', [MakananController::class, 'destroy'])->name('destroy');
            });

            // KATEGORI LAINNYA
            Route::prefix('kategori')->group(function () {
                Route::get('minuman', [MakananController::class, 'minuman'])->name('data.kategori.minuman');
                Route::get('alat_tulis', [MakananController::class, 'alat_tulis'])->name('data.kategori.alat_tulis');
                Route::get('seragam', [MakananController::class, 'seragam'])->name('data.kategori.seragam');
                Route::get('lainya', [MakananController::class, 'lainya'])->name('data.kategori.lainya');
            });

            // KESEHATAN & KEBERSIHAN
            Route::prefix('kategori/kesehatandankebersihan')
                ->name('kategori.kesehatandankebersihan.')
                ->controller(KesehatandankebersihanController::class)
                ->group(function () {
                    Route::get('/', 'kesehatandankebersihan')->name('index');
                    Route::get('create', 'create')->name('create');
                });
        });
    });
});
