<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anggota;
use App\Models\Rapat;
use App\Models\ProgramKerja;
use App\Models\Evaluasi;

class DashboardSeeder extends Seeder
{
    public function run()
    {
        // Seed Anggota
        Anggota::create([
            'id' => 'ANG001',
            'nama' => 'John Doe',
            'kelas' => 'XII RPL',
            'jabatan' => 'Ketua',
            'kontak' => '08123456789',
            'foto' => null,
        ]);

        // Seed Rapat
        Rapat::create([
            'id' => 'RPT001',
            'judul' => 'Rapat Bulanan',
            'nama' => 'Rapat OSIS',
            'tanggal' => now()->addDays(1),
            'tempat' => 'Aula Sekolah',
            'status' => 'belum',
        ]);

        // Seed Program Kerja
        ProgramKerja::create([
            'id' => 'PRK001',
            'nama' => 'Program Kreativitas',
            'deskripsi' => 'Program untuk meningkatkan kreativitas siswa',
            'penanggung_jawab_id' => 'ANG001', // FK ke anggota, string
            'status' => 'belum', // ubah ke enum yang valid
        ]);

        // Seed Evaluasi
        Evaluasi::create([
            'program_id' => 'PRK001',
            'judul' => 'Evaluasi awal program',
            'isi' => 'Evaluasi awal program',
            'tanggal' => now(),
            'penulis' => 'Admin',
            'file' => null,
        ]);
    }
}
