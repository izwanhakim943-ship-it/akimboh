
<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard')->name('dashboard');
Route::view('/music', 'music')->name('music');
Route::view('/money', 'money')->name('money');
Route::view('/gallery', 'gallery')->name('gallery');
