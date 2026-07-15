<?php

namespace App\Http\Controllers;

class ProfilController extends Controller
{
    public function index()
    {
        $mahasiswa = [
            'nama'     => 'Muhammad rizal Chaerul Syahputra',
            'nim'      => '3337250103',
            'prodi'    => 'Informatika',
            'angkatan' => 2025,
            'ipk'      => 4.00,
            'email'    => 'rizalchaeruls.rs@gmail.com',
            'github'   => 'github.com/mochyzuki',
            'skill'    => ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'Git'],
            'bio'      => 'Mahasiswa Informatika UNTIRTA yang semangat belajar.',
        ];

        return view('profil', compact('mahasiswa'));
    }
}
