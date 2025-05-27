<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\api\Dokter\PemeriksaanDokterController;
use App\Http\Controllers\api\Perawat\PemeriksaanPerawatController;

// API Route PemeriksaanDokter
Route::get('dokter/pemeriksaan', [PemeriksaanDokterController::class, 'index']);
Route::get('dokter/pemeriksaan/{id}', [PemeriksaanDokterController::class, 'show']);
Route::post('dokter/pemeriksaan', [PemeriksaanDokterController::class, 'store']);
Route::put('dokter/pemeriksaan/{id}', [PemeriksaanDokterController::class, 'update']);
Route::delete('dokter/pemeriksaan/{id}', [PemeriksaanDokterController::class, 'destroy']);

// API Route PemeriksaanPerawat
Route::get('perawat/pemeriksaan', [PemeriksaanPerawatController::class, 'index']);
Route::get('perawat/pemeriksaan/{id}', [PemeriksaanPerawatController::class, 'show']);
Route::post('perawat/pemeriksaan', [PemeriksaanPerawatController::class, 'store']);
Route::put('perawat/pemeriksaan/{id}', [PemeriksaanPerawatController::class, 'update']);
Route::delete('perawat/pemeriksaan/{id}', [PemeriksaanPerawatController::class, 'destroy']);

// API Route E-Resep
Route::get('dokter/eresep', [EresepController::class, 'index']);
Route::get('dokter/eresep/{id}', [EresepController::class, 'show']);
Route::post('dokter/eresep', [EresepController::class, 'store']);
Route::put('dokter/eresep/{id}', [EresepController::class, 'update']);
Route::delete('dokter/eresep/{id}', [EresepController::class, 'destroy']);

// API Route E-Resep Detail