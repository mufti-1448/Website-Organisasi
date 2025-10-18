<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokumentasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Dokumentasi::create([
            'judul' => 'Dokumentasi Rapat Bulanan',
            'deskripsi' => 'Dokumentasi kegiatan rapat bulanan organisasi yang membahas program kerja.',
            'tanggal' => '2025-10-01',
            'kategori' => 'Rapat',
            'foto' => null,
        ]);

        \App\Models\Dokumentasi::create([
            'judul' => 'Kegiatan Sosialisasi',
            'deskripsi' => 'Foto-foto kegiatan sosialisasi program kerja kepada anggota.',
            'tanggal' => '2025-10-05',
            'kategori' => 'Sosialisasi',
            'foto' => null,
        ]);

        \App\Models\Dokumentasi::create([
            'judul' => 'Pelatihan Anggota',
            'deskripsi' => 'Dokumentasi pelatihan keterampilan untuk anggota organisasi.',
            'tanggal' => '2025-10-10',
            'kategori' => 'Pelatihan',
            'foto' => null,
        ]);
    }
}
