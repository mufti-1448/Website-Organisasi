<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProgramKerja;
use Carbon\Carbon;

class ProgramKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProgramKerja::create([
            'id' => 'PRK001',
            'nama' => 'Pelatihan Keterampilan Digital',
            'deskripsi' => 'Program pelatihan untuk meningkatkan keterampilan digital anggota organisasi.',
            'penanggung_jawab_id' => 'AGT001',
            'status' => 'berlangsung',
            'target_date' => Carbon::now()->addMonths(3)->toDateString(),
            'progress' => 50,
        ]);

        ProgramKerja::create([
            'id' => 'PRK002',
            'nama' => 'Bakti Sosial Lingkungan',
            'deskripsi' => 'Kegiatan bakti sosial untuk membersihkan lingkungan sekolah.',
            'penanggung_jawab_id' => 'AGT002',
            'status' => 'belum',
            'target_date' => Carbon::now()->addMonths(1)->toDateString(),
            'progress' => 0,
        ]);

        ProgramKerja::create([
            'id' => 'PRK003',
            'nama' => 'Workshop Pemrograman',
            'deskripsi' => 'Workshop intensif tentang pemrograman web dan mobile.',
            'penanggung_jawab_id' => 'AGT003',
            'status' => 'selesai',
            'target_date' => Carbon::now()->subWeeks(2)->toDateString(),
            'progress' => 100,
        ]);

        ProgramKerja::create([
            'id' => 'PRK004',
            'nama' => 'Kompetisi Coding',
            'deskripsi' => 'Mengikuti kompetisi coding tingkat nasional.',
            'penanggung_jawab_id' => 'AGT004',
            'status' => 'berlangsung',
            'target_date' => Carbon::now()->addMonths(2)->toDateString(),
            'progress' => 25,
        ]);

        ProgramKerja::create([
            'id' => 'PRK005',
            'nama' => 'Pengembangan Website Organisasi',
            'deskripsi' => 'Membuat dan mengembangkan website resmi organisasi.',
            'penanggung_jawab_id' => 'AGT005',
            'status' => 'berlangsung',
            'target_date' => Carbon::now()->addMonths(4)->toDateString(),
            'progress' => 75,
        ]);
    }
}
