<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Notulen;
use Carbon\Carbon;

class NotulenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Notulen::create([
            'id' => 'NTL001',
            'rapat_id' => 'RPT001',
            'judul' => 'Notulen Rapat Pembentukan Program Kerja',
            'isi' => 'Dalam rapat ini, dibahas pembentukan program kerja untuk semester ini. Ketua menyampaikan visi dan misi organisasi. Anggota memberikan masukan mengenai program yang akan dijalankan.',
            'tanggal' => Carbon::now()->subDays(30)->toDateString(),
            'waktu' => '08:00:00',
            'penulis_id' => 'AGT001',
            'program_id' => 'PRK001',
            'file_path' => null,
        ]);

        Notulen::create([
            'id' => 'NTL002',
            'rapat_id' => 'RPT002',
            'judul' => 'Notulen Rapat Evaluasi Kegiatan Bulanan',
            'isi' => 'Rapat evaluasi kegiatan bulan lalu. Dibahas pencapaian target dan kendala yang dihadapi. Disepakati perbaikan untuk kegiatan selanjutnya.',
            'tanggal' => Carbon::now()->subDays(15)->toDateString(),
            'waktu' => '10:00:00',
            'penulis_id' => 'AGT002',
            'program_id' => 'PRK002',
            'file_path' => null,
        ]);

        Notulen::create([
            'id' => 'NTL003',
            'rapat_id' => null,
            'judul' => 'Notulen Diskusi Internal',
            'isi' => 'Diskusi internal mengenai pengembangan anggota. Dibahas program mentoring dan pelatihan tambahan.',
            'tanggal' => Carbon::now()->subDays(7)->toDateString(),
            'waktu' => '15:00:00',
            'penulis_id' => 'AGT003',
            'program_id' => 'PRK003',
            'file_path' => null,
        ]);

        Notulen::create([
            'id' => 'NTL004',
            'rapat_id' => 'RPT004',
            'judul' => 'Notulen Rapat Koordinasi dengan Guru Pembimbing',
            'isi' => 'Koordinasi dengan guru pembimbing mengenai kegiatan organisasi. Mendapatkan saran dan arahan untuk perbaikan.',
            'tanggal' => Carbon::now()->addDays(14)->toDateString(),
            'waktu' => '09:00:00',
            'penulis_id' => 'AGT004',
            'program_id' => 'PRK004',
            'file_path' => null,
        ]);

        Notulen::create([
            'id' => 'NTL005',
            'rapat_id' => 'RPT005',
            'judul' => 'Notulen Rapat Darurat Penanganan Masalah',
            'isi' => 'Rapat darurat untuk menangani masalah mendadak dalam organisasi. Dibahas solusi cepat dan langkah-langkah pencegahan.',
            'tanggal' => Carbon::now()->toDateString(),
            'waktu' => '16:00:00',
            'penulis_id' => 'AGT005',
            'program_id' => 'PRK005',
            'file_path' => null,
        ]);
    }
}
