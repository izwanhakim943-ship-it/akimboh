
<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicController;

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

    
Route::get('/music', [MusicController::class, 'index'])
    ->name('music');

Route::post('/music', [MusicController::class, 'store'])
    ->name('music.store');

Route::get('/music/files/{song}/audio', [MusicController::class, 'audio'])
    ->name('music.audio');

Route::get('/music/files/{song}/cover', [MusicController::class, 'cover'])
    ->name('music.cover');

Route::delete('/music/{song}', [MusicController::class, 'destroy'])
    ->name('music.destroy');


    Route::view('/money', 'money')->name('money');

    Route::view('/gallery', 'gallery')->name('gallery');

    Route::post('/logout', [
        LoginController::class,
        'destroy',
    ])->name('logout');
});
