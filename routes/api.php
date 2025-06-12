<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RfidController;
use App\Http\Controllers\Api\FlameController;
use App\Http\Controllers\ParkingController;

Route::post('/rfid', [RfidController::class, 'store']);
Route::get('/rfid', [RfidController::class, 'index']);

Route::post('/flame', [FlameController::class, 'store']);
Route::get('/flame/latest', [FlameController::class, 'latest']);
Route::get('/flame', [FlameController::class, 'index']);
Route::post('/parkir', [ParkingController::class, 'updateSlot']);