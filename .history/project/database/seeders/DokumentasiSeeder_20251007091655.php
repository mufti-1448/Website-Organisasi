<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokumentasiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dokumentasi')->insert([
            [
                'rapat_id' => 1,
                'foto' => 'rapat1.jpg',
                'deskripsi' => 'Foto kegiatan rapat persiapan HUT Sekolah.'
            ],
            [
                'rapat_id' => 2,
                'foto' => 'rapat2.jpg',
                'deskripsi' => 'Foto dokumentasi rapat akhir tahun.'
            ]
        ]);
    }
}
