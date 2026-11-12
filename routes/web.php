<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

Route::get('/', fn() => redirect()->route('services.index'));/* por que esta forma?  puedo redirigir usando el nombre de la ruta, para que si mañana cambio la URL no se rompa */
Route::patch('services/{service}/check', [ServiceController::class, 'check'])->name('services.check');
Route::resource('services', ServiceController::class);