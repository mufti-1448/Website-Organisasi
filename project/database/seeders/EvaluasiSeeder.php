<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Evaluasi;
use Carbon\Carbon;

class EvaluasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Evaluasi::create([
            'id' => 'EVL001',
            'program_id' => 'PRK001',
            'judul' => 'Evaluasi Pelatihan Keterampilan Digital',
            'isi' => 'Evaluasi program pelatihan keterampilan digital menunjukkan peningkatan kemampuan anggota sebesar 70%. Perlu perbaikan pada materi dan metode pengajaran.',
            'tanggal' => Carbon::now()->subDays(10)->toDateString(),
            'penulis' => 'Mala Sari',
            'file' => null,
        ]);

        Evaluasi::create([
            'id' => 'EVL002',
            'program_id' => 'PRK002',
            'judul' => 'Evaluasi Bakti Sosial Lingkungan',
            'isi' => 'Kegiatan bakti sosial berhasil membersihkan 5 titik lokasi. Partisipasi anggota mencapai 80%. Saran: Tingkatkan koordinasi dengan pihak sekolah.',
            'tanggal' => Carbon::now()->subDays(5)->toDateString(),
            'penulis' => 'Ahmad Fauzi',
            'file' => null,
        ]);

        Evaluasi::create([
            'id' => 'EVL003',
            'program_id' => 'PRK003',
            'judul' => 'Evaluasi Workshop Pemrograman',
            'isi' => 'Workshop pemrograman sangat berhasil dengan feedback positif dari peserta. Tingkat kepuasan mencapai 95%. Rekomendasi: Tambahkan sesi praktikum lebih banyak.',
            'tanggal' => Carbon::now()->subWeeks(2)->toDateString(),
            'penulis' => 'Siti Nurhaliza',
            'file' => null,
        ]);

        Evaluasi::create([
            'id' => 'EVL004',
            'program_id' => 'PRK004',
            'judul' => 'Evaluasi Kompetisi Coding',
            'isi' => 'Tim berhasil mencapai babak semifinal. Kekuatan: Kemampuan teknis. Kelemahan: Manajemen waktu. Saran: Tambahkan latihan intensif.',
            'tanggal' => Carbon::now()->toDateString(),
            'penulis' => 'Budi Santoso',
            'file' => null,
        ]);

        Evaluasi::create([
            'id' => 'EVL005',
            'program_id' => 'PRK005',
            'judul' => 'Evaluasi Pengembangan Website Organisasi',
            'isi' => 'Website organisasi telah mencapai 75% progress. Fitur utama sudah berfungsi. Perlu perbaikan pada desain responsif dan keamanan.',
            'tanggal' => Carbon::now()->addDays(3)->toDateString(),
            'penulis' => 'Maya Sari',
            'file' => null,
        ]);
    }
}
