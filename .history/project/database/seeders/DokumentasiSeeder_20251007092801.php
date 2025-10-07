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
                'judul' => 'Rapat Persiapan HUT Sekolah', // ✅ tambahkan
                'deskripsi' => 'Foto kegiatan rapat persiapan HUT Sekolah.',
                'foto' => 'rapat1.jpg',
                'tanggal' => now(),
                'kategori' => 'Rapat',
                'rapat_id' => 1,
            ],
            [
                'judul' => 'Rapat Akhir Tahun', // ✅ tambahkan
                'deskripsi' => 'Foto dokumentasi rapat akhir tahun.',
                'foto' => 'rapat2.jpg',
                'tanggal' => now(),
                'kategori' => 'Rapat',
                'rapat_id' => 2,
            ],
        ]);
    }
}
