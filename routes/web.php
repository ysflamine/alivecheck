<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

Route::resource('services', ServiceController::class);