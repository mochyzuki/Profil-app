<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
{
    $info = [
        'matakuliah' => 'Pemrograman Web',
        'semester'   => 'Genap 2024/2025',
        'dosen'      => 'Royan Habibie Sukarna, S.Kom., M.Kom.',
    ];
    return view('tentang', compact('info'));
}

}
