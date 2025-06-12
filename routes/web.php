<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\ParkingController; // Tidak perlu lagi jika ParkingController hanya untuk API

Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::get('/beranda', [DashboardController::class, 'beranda']);
Route::get('/', [DashboardController::class, 'beranda']);

// Baris ini dihapus karena sudah ditangani oleh DashboardController::dashboard
// Route::get('/dashboard', [ParkingController::class, 'dashboard']); 