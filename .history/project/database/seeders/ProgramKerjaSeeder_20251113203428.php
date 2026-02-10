<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProgramKerja;
use App\Models\Anggota;

class ProgramKerjaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // Pastikan ada anggota terlebih dahulu
    $anggota = Anggota::first();
    if (!$anggota) {
      // Jika belum ada anggota, buat satu anggota dummy
      $anggota = Anggota::create([
        'id' => 'AGT001',
        'nama' => 'John Doe',
        'email' => 'john@example.com',
        'kontak' => '08123456789',
        'kelas' => 'XII RPL 2',
        'jabatan' => 'Ketua',
        'alamat' => 'Jl. Contoh No. 123',
        'foto' => null,
      ]);
    }

    $programKerja = [
      [
        'id' => 'PRK001',
        'nama' => 'Pelatihan Kepemimpinan',
        'deskripsi' => 'Program pengembangan soft skills dan leadership untuk meningkatkan kemampuan kepemimpinan anggota.',
        'penanggung_jawab_id' => $anggota->id,
        'status' => 'berlangsung',
        'target_date' => '2024-11-30',
        'progress' => 75,
      ],
      [
        'id' => 'PRK002',
        'nama' => 'Bakti Sosial Ramadan',
        'deskripsi' => 'Kegiatan berbagi dan peduli sesama melalui program bantuan sosial di bulan suci Ramadan.',
        'penanggung_jawab_id' => $anggota->id,
        'status' => 'belum',
        'target_date' => '2025-03-15',
        'progress' => 0,
      ],
      [
        'id' => 'PRK003',
        'nama' => 'Kompetisi Kreativitas',
        'deskripsi' => 'Lomba kreativitas antar anggota untuk mengasah kemampuan inovasi dan berpikir out of the box.',
        'penanggung_jawab_id' => $anggota->id,
        'status' => 'selesai',
        'target_date' => '2024-08-20',
        'progress' => 100,
      ],
      [
        'id' => 'PRK004',
        'nama' => 'Workshop Digital Marketing',
        'deskripsi' => 'Pelatihan keterampilan digital marketing untuk meningkatkan kemampuan promosi dan branding organisasi.',
        'penanggung_jawab_id' => $anggota->id,
        'status' => 'berlangsung',
        'target_date' => '2024-10-25',
        'progress' => 50,
      ],
    ];

    foreach ($programKerja as $program) {
      ProgramKerja::create($program);
    }
  }
}
