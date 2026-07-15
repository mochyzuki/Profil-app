<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama agar tidak duplikat saat seed ulang
        Mahasiswa::truncate();

        $data = [
            ['nama'=>'Budi Santoso',  'nim'=>'3411221001', 'ipk'=>3.85,
             'prodi'=>'Informatika', 'angkatan'=>2022,
             'email'=>'budi@example.com', 'github'=>'github.com/budi',
             'bio'=>'Mahasiswa aktif yang gemar web development.'],

            ['nama'=>'Ani Rahayu',    'nim'=>'3411221002', 'ipk'=>3.72,
             'prodi'=>'Informatika', 'angkatan'=>2022,
             'email'=>'ani@example.com', 'github'=>'github.com/ani',
             'bio'=>'Tertarik di bidang UI/UX dan frontend.'],

            ['nama'=>'Citra Dewi',    'nim'=>'3411221003', 'ipk'=>3.91,
             'prodi'=>'Informatika', 'angkatan'=>2022,
             'email'=>'citra@example.com', 'github'=>'github.com/citra',
             'bio'=>'Passionate tentang machine learning dan data science.'],

            ['nama'=>'Dodi Pratama',  'nim'=>'3411221004', 'ipk'=>3.45,
             'prodi'=>'Informatika', 'angkatan'=>2022,
             'email'=>'dodi@example.com', 'github'=>'github.com/dodi',
             'bio'=>'Suka pengembangan aplikasi mobile dan IoT.'],

            ['nama'=>'Eka Wulandari', 'nim'=>'3411221005', 'ipk'=>3.68,
             'prodi'=>'Informatika', 'angkatan'=>2022,
             'email'=>'eka@example.com', 'github'=>'github.com/eka',
             'bio'=>'Fokus di bidang cybersecurity dan jaringan komputer.'],
        ];

        foreach ($data as $mhs) {
            Mahasiswa::create($mhs);
        }
    }
}
