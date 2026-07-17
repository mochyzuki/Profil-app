<?php
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\MahasiswaApiController;
use Illuminate\Support\Facades\Route;

// ── AUTH ROUTES (publik) ────────────────────────────
Route::post('/login',  [AuthApiController::class, 'login']);

// ── MAHASISWA READ (publik, tanpa token) ─────────────
Route::get('/mahasiswas',      [MahasiswaApiController::class, 'index']);
Route::get('/mahasiswas/{id}', [MahasiswaApiController::class, 'show']);

// ── ROUTE TERPROTEKSI (butuh Bearer token Sanctum) ───
Route::middleware('auth:sanctum')->group(function () {

    // Auth
    Route::post('/logout', [AuthApiController::class, 'logout']);

    // Mahasiswa write operations
    Route::post('/mahasiswas',         [MahasiswaApiController::class, 'store']);
    Route::put('/mahasiswas/{id}',     [MahasiswaApiController::class, 'update']);
    Route::delete('/mahasiswas/{id}',  [MahasiswaApiController::class, 'destroy']);

});
