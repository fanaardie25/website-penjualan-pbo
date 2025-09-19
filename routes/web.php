<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('books', App\Http\Controllers\BookController::class);
Route::get('/dashboard', function () {
    return view('Dashboard.index');
})->name('dashboard');