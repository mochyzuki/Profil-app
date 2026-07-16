<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // Kolom yang boleh diisi via create() atau fill()
protected $fillable = [
    'nama', 'nim', 'prodi', 'angkatan',
    'ipk', 'email', 'github', 'bio',
    'user_id',   // Tambahkan ini
];


    // Konversi tipe data otomatis
    protected $casts = [
        'ipk'      => 'decimal:2',
        'angkatan' => 'integer',
    ];
    
}
