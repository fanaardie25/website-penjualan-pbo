<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login/submit', [AuthController::class, 'store_login'])->name('store_login');
Route::post('/register/submit', [AuthController::class, 'store_register'])->name('store_register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');
});

Route::resource('books', App\Http\Controllers\BookController::class);
Route::get('/dashboard', function () {
    return view('Dashboard.index');
})->name('dashboard');