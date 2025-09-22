<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManageOrderController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login/submit', [AuthController::class, 'store_login'])->name('store_login');
Route::post('/register/submit', [AuthController::class, 'store_register'])->name('store_register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::middleware('auth')->group(function () {
//     Route::get('/', function () {
//         return view('welcome');
//     })->name('dashboard');
// });

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('auth')->group(function () {

    Route::resource('books', App\Http\Controllers\BookController::class);

    Route::get('/manage-orders', [App\Http\Controllers\ManageOrderController::class, 'index'])->name('manage-orders.index');

    Route::put('/manage-orders/{user}/{book}/status', [ManageOrderController::class, 'updateStatus'])
        ->name('orders.update-status');


    Route::get('/dashboard', function () {
        return view('Dashboard.index');
    })->name('dashboard');

        Route::resource('type_books', App\Http\Controllers\TypeController::class);

});
