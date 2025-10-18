<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rapat;

class RapatSeeder extends Seeder
{
    public function run()
    {
        Rapat::create([
            'id' => 'RPT001',
            'judul' => 'Rapat Pembentukan OSIS',
            'nama' => 'Rapat OSIS',
            'tanggal' => '2025-10-01',
            'tempat' => 'Aula Sekolah',
            'status' => 'selesai',
        ]);

        Rapat::create([
            'id' => 'RPT002',
            'judul' => 'Rapat Evaluasi Program Kerja',
            'nama' => 'Rapat Evaluasi',
            'tanggal' => '2025-10-15',
            'tempat' => 'Ruang Guru',
            'status' => 'berlangsung',
        ]);

        Rapat::create([
            'id' => 'RPT003',
            'judul' => 'Rapat Perencanaan Acara',
            'nama' => 'Rapat Acara',
            'tanggal' => '2025-11-01',
            'tempat' => 'Aula Sekolah',
            'status' => 'belum',
        ]);
    }
}
