<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminAuthController;

Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminAuthController::class, 'authenticate'])->name('login.attempt');
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

// rutas protegidas por el middleware 'admin'
Route::middleware('admin')->group(function () {
    Route::get('/', fn() => redirect()->route('services.index'));
    Route::patch('services/{service}/check', [ServiceController::class, 'check'])->name('services.check');
    Route::resource('services', ServiceController::class);
});