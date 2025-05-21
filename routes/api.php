<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\api\Dokter\PemeriksaanDokterController;


// API Route Dokter
Route::get('dokter/pemeriksaan', [PemeriksaanDokterController::class, 'index']);
Route::get('dokter/pemeriksaan/{id}', [PemeriksaanDokterController::class, 'show']);
Route::post('dokter/pemeriksaan', [PemeriksaanDokterController::class, 'store']);
Route::put('dokter/pemeriksaan/{id}', [PemeriksaanDokterController::class, 'update']);
Route::delete('dokter/pemeriksaan/{id}', [PemeriksaanDokterController::class, 'destroy']);
//             return response()->json($pemeriksaan);
