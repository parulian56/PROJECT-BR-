<?php
<<<<<<< HEAD

use Illuminate\Support\Facades\Route;
=======
use App\Http\Controllers\Auth\RegisterController;
>>>>>>> c44af7731b98814ef702d5d66c550aa27039acc6
use App\Http\Controllers\{
    Auth\AuthenticatedSessionController,
    ProfileController,
    DataController,
    KesehatandankebersihanController,
    MakananController,
    DashboardController,
    TransaksiKasirController,
<<<<<<< HEAD
    LainyaController
=======
    ReportController,
    UserController,
>>>>>>> c44af7731b98814ef702d5d66c550aa27039acc6
};
use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
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
=======
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
          Route::get('/reports', [ReportController::class, 'index'])->name('reports');

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
>>>>>>> c44af7731b98814ef702d5d66c550aa27039acc6
        });
    });
});
require __DIR__.'/auth.php';
