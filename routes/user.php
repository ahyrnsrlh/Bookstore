<?php 

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    // Halaman utama yang hanya bisa diakses oleh pengguna yang sudah login
    Route::get('/', function () {
        return view('home'); // Pastikan Anda memiliki view 'home' sebagai halaman utama
    })->name('home');

    Route::post('/logout', 'AuthController@logout')->name('logout');

    // Cart routes
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::view('/', 'cart')->name('index');
        Route::post('/store', 'CartController@store')->name('store');
    });

    // User routes
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', function () {
            return 'Login Berhasil';
        });
        Route::view('/profile', 'user.profile')->name('profile');
    });

    // Transaction routes
    Route::get('/transaction/payment/{id}', 'TransactionController@payment')->name('transaction.payment');

    // Resource controller untuk transaksi
    Route::resource('/transaction', 'TransactionController', ['only' => ['index', 'create', 'store', 'show']]);
});

// Group untuk pengguna yang belum login
Route::middleware('guest')->group(function () {
    // Halaman registrasi
    Route::view('/register', 'auth.register')->name('register');

    // Halaman login
    Route::get('/login', function () {
        if (auth()->check()) {
            // Arahkan ke halaman utama jika sudah login
            return redirect()->route('home');
        }
        return view('auth.login'); // Tampilkan halaman login jika belum login
    })->name('login');

    // Proses login
    Route::post('/login', 'AuthController@login')->name('login.post'); // Route untuk login POST
});
?>
