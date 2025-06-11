<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::get('/beranda', [DashboardController::class, 'beranda']);
Route::get('/', [DashboardController::class, 'beranda']);