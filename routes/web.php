<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

Route::patch('services/{service}/check', [ServiceController::class, 'check'])->name('services.check');
Route::resource('services', ServiceController::class);