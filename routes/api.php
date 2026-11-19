<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\DaftarServiceController;
use App\Http\Controllers\DataServiceController;
use App\Http\Controllers\PembayaranController;

// 1. Pelanggan API (GET, POST, PUT, DELETE)
Route::get('/pelanggan', [PelangganController::class, 'apiIndex']);
Route::post('/pelanggan', [PelangganController::class, 'apiStore']);
Route::get('/pelanggan/{id}', [PelangganController::class, 'apiShow']);
Route::put('/pelanggan/{id}', [PelangganController::class, 'apiUpdate']);
Route::delete('/pelanggan/{id}', [PelangganController::class, 'apiDestroy']);

// 2. Kendaraan API (GET, POST, PUT, DELETE)
Route::get('/kendaraan', [KendaraanController::class, 'apiIndex']);
Route::post('/kendaraan', [KendaraanController::class, 'apiStore']);
Route::get('/kendaraan/{id}', [KendaraanController::class, 'apiShow']);
Route::put('/kendaraan/{id}', [KendaraanController::class, 'apiUpdate']);
Route::delete('/kendaraan/{id}', [KendaraanController::class, 'apiDestroy']);

// 3. Daftar Service API (GET, POST, PUT, DELETE)
Route::get('/daftar-service', [DaftarServiceController::class, 'apiIndex']);
Route::post('/daftar-service', [DaftarServiceController::class, 'apiStore']);
Route::get('/daftar-service/{id}', [DaftarServiceController::class, 'apiShow']);
Route::put('/daftar-service/{id}', [DaftarServiceController::class, 'apiUpdate']);
Route::delete('/daftar-service/{id}', [DaftarServiceController::class, 'apiDestroy']);

// 4. Data Service API (GET, POST, PUT, DELETE)
Route::get('/data-service', [DataServiceController::class, 'apiIndex']);
Route::post('/data-service', [DataServiceController::class, 'apiStore']);
Route::get('/data-service/{id}', [DataServiceController::class, 'apiShow']);
Route::put('/data-service/{id}', [DataServiceController::class, 'apiUpdate']);
Route::delete('/data-service/{id}', [DataServiceController::class, 'apiDestroy']);

// 5. Pembayaran Service API (GET, POST, PUT, DELETE)
Route::get('/pembayaran', [PembayaranController::class, 'apiIndex']);
Route::post('/pembayaran', [PembayaranController::class, 'apiStore']);
Route::get('/pembayaran/{id}', [PembayaranController::class, 'apiShow']);
Route::put('/pembayaran/{id}', [PembayaranController::class, 'apiUpdate']);
Route::delete('/pembayaran/{id}', [PembayaranController::class, 'apiDestroy']);