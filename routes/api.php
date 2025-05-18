<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\api\Dokter\PemeriksaanDokterController;


// API Route Dokter
Route::get('dokter/pemeriksaan', [PemeriksaanDokterController::class, 'index']);
Route::get('dokter/pemeriksaan/{id}', [PemeriksaanDokterController::class, 'show']);
Route::post('dokter/pemeriksaan', [PemeriksaanDokterController::class, 'store']);