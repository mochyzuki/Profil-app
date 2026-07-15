<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TentangController;

// Route bawaan Laravel (biarkan tetap ada)
Route::get('/', function () {
    return view('welcome');
});

// Route baru yang kita tambahkan
Route::get('/profil', [ProfilController::class, 'index'])
     ->name('profil');

Route::get('/tentang', [TentangController::class, 'index'])
     ->name('tentang');

     Route::get('/mahasiswa/{id}', [ProfilController::class, 'show'])
     ->name('mahasiswa.show');
