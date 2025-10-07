<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramKerjaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('program_kerja')->insert([
            [
                'nama' => 'Kegiatan Bakti Sosial',
                'deskripsi' => 'Mengadakan kegiatan sosial di lingkungan sekitar sekolah.',
                'penanggung_jawab' => 1, // id dari anggota (contoh)
                'status' => 'Berjalan',
            ],
            [
                'nama' => 'Pelatihan Kepemimpinan',
                'deskripsi' => 'Pelatihan dasar untuk anggota baru agar lebih disiplin dan tanggung jawab.',
                'penanggung_jawab' => 2,
                'status' => 'Selesai',
            ],
            [
                'nama' => 'Lomba Kebersihan Kelas',
                'deskripsi' => 'Program lomba antar kelas untuk menjaga kebersihan sekolah.',
                'penanggung_jawab' => 3,
                'status' => 'Direncanakan',
            ],
        ]);
    }
}
