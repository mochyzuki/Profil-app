<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;   // Import Model

class ProfilController extends Controller
{
    public function index()
    {
        // SEBELUM (hapus ini):
        // $mahasiswas = [['nama'=>'Budi',...], ...];

        // SESUDAH: ambil dari database, urutkan IPK tertinggi dulu
        $mahasiswas = Mahasiswa::orderBy('ipk', 'desc')->get();

        return view('profil', compact('mahasiswas'));
    }

    // Method baru untuk halaman detail satu mahasiswa
    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('profil-detail', compact('mahasiswa'));
    }
}
