<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JenisKopiController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

// Redirect root ke login
Route::get('/', fn() => redirect()->route('login'));

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// CRUD routes (hanya bisa diakses saat login)
Route::middleware('auth')->group(function () {
    Route::resource('kopi', JenisKopiController::class);
    Route::resource('supplier', SupplierController::class);
});
