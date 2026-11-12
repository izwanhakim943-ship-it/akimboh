
<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [
        LoginController::class,
        'show',
    ])->name('login');

    Route::post('/login', [
        LoginController::class,
        'store',
    ])->middleware('throttle:5,1')->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::view('/', 'dashboard')->name('dashboard');

    Route::view('/music', 'music')->name('music');

    Route::view('/money', 'money')->name('money');

    Route::view('/gallery', 'gallery')->name('gallery');

    Route::post('/logout', [
        LoginController::class,
        'destroy',
    ])->name('logout');
});
