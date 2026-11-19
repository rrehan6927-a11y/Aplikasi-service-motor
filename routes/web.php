<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\DaftarServiceController;
use App\Http\Controllers\DataServiceController;
use App\Http\Controllers\PembayaranController;

// Ubah rute utama '/' langsung mengarah ke halaman data pelanggan (atau buat halaman dashboard)
Route::get('/', [PelangganController::class, 'index'])->name('home');

// Web Routes
Route::resource('pelanggan', PelangganController::class);
Route::resource('kendaraan', KendaraanController::class);
Route::resource('daftar-service', DaftarServiceController::class);
Route::resource('data-service', DataServiceController::class);
Route::resource('pembayaran', PembayaranController::class);

// AJAX Routes untuk Auto-fill
Route::get('/get-pelanggan/{id}', [DaftarServiceController::class, 'getPelanggan']);
Route::get('/get-keluhan/{id}', [DataServiceController::class, 'getKeluhan']);