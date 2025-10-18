<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgramKerja;

class ProgramKerjaSeeder extends Seeder
{
    public function run()
    {
        ProgramKerja::create([
            'id' => 'PRK001',
            'nama' => 'Program Kreativitas Siswa',
            'deskripsi' => 'Program untuk meningkatkan kreativitas siswa melalui berbagai kegiatan seni dan budaya.',
            'penanggung_jawab_id' => 'AGT001',
            'status' => 'berlangsung',
        ]);

        ProgramKerja::create([
            'id' => 'PRK002',
            'nama' => 'Program Pendidikan Karakter',
            'deskripsi' => 'Program pembentukan karakter siswa melalui kegiatan sosial dan kemasyarakatan.',
            'penanggung_jawab_id' => 'AGT002',
            'status' => 'belum',
        ]);

        ProgramKerja::create([
            'id' => 'PRK003',
            'nama' => 'Program Olahraga Sekolah',
            'deskripsi' => 'Program pengembangan olahraga untuk meningkatkan kesehatan dan prestasi siswa.',
            'penanggung_jawab_id' => 'AGT003',
            'status' => 'selesai',
        ]);
    }
}
