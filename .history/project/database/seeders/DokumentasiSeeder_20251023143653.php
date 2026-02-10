<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dokumentasi;
use Carbon\Carbon;

class DokumentasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dokumentasi::create([
            'id' => 'DKM001',
            'rapat_id' => 'RPT001',
            'program_id' => 'PRK001',
            'judul' => 'Dokumentasi Rapat Pembentukan Program Kerja',
            'deskripsi' => 'Foto-foto dokumentasi rapat pembentukan program kerja yang diadakan di ruang rapat sekolah.',
            'tanggal' => Carbon::now()->subDays(30)->toDateString(),
            'kategori' => 'Rapat',
            'foto' => 'uploads/dokumentasi/rapat_pembentukan.jpg',
        ]);

        Dokumentasi::create([
            'id' => 'DKM002',
            'rapat_id' => 'RPT002',
            'program_id' => 'PRK002',
            'judul' => 'Dokumentasi Bakti Sosial Lingkungan',
            'deskripsi' => 'Dokumentasi kegiatan bakti sosial membersihkan lingkungan sekolah dengan partisipasi aktif anggota.',
            'tanggal' => Carbon::now()->subDays(20)->toDateString(),
            'kategori' => 'Kegiatan',
            'foto' => 'uploads/dokumentasi/bakti_sosial.jpg',
        ]);

        Dokumentasi::create([
            'id' => 'DKM003',
            'rapat_id' => null,
            'program_id' => 'PRK003',
            'judul' => 'Dokumentasi Workshop Pemrograman',
            'deskripsi' => 'Foto-foto peserta workshop pemrograman yang sedang mengikuti sesi praktikum intensif.',
            'tanggal' => Carbon::now()->subWeeks(2)->toDateString(),
            'kategori' => 'Workshop',
            'foto' => 'uploads/dokumentasi/workshop_programming.jpg',
        ]);

        Dokumentasi::create([
            'id' => 'DKM004',
            'rapat_id' => 'RPT004',
            'program_id' => 'PRK004',
            'judul' => 'Dokumentasi Kompetisi Coding',
            'deskripsi' => 'Dokumentasi tim yang sedang berpartisipasi dalam kompetisi coding tingkat nasional.',
            'tanggal' => Carbon::now()->subDays(5)->toDateString(),
            'kategori' => 'Kompetisi',
            'foto' => 'uploads/dokumentasi/kompetisi_coding.jpg',
        ]);

        Dokumentasi::create([
            'id' => 'DKM005',
            'rapat_id' => null,
            'program_id' => 'PRK005',
            'judul' => 'Dokumentasi Pengembangan Website',
            'deskripsi' => 'Screenshot dan dokumentasi progress pengembangan website resmi organisasi.',
            'tanggal' => Carbon::now()->toDateString(),
            'kategori' => 'Proyek',
            'foto' => 'uploads/dokumentasi/website_development.jpg',
        ]);
    }
}
