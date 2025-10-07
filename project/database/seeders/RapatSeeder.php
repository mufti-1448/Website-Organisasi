<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RapatSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rapat')->insert([
            [
                'judul' => 'Rapat Persiapan Acara HUT Sekolah',
                'tanggal' => '2025-09-15',
                'tempat' => 'Ruang OSIS',
                'keterangan' => 'Membahas persiapan lomba dan dekorasi.'
            ],
            [
                'judul' => 'Rapat Akhir Tahun',
                'tanggal' => '2025-12-20',
                'tempat' => 'Aula Utama',
                'keterangan' => 'Evaluasi kegiatan selama setahun.'
            ]
        ]);
    }
}
