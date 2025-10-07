<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EvaluasiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('evaluasi')->insert([
            [
                'program_id' => 1,
                'catatan' => 'Kegiatan berjalan lancar dan mendapat respon positif.',
                'status' => 'Selesai',
                'tanggal' => Carbon::parse('2025-09-15'),
            ],
            [
                'program_id' => 2,
                'catatan' => 'Peserta cukup aktif, namun perlu peningkatan pada sesi tanya jawab.',
                'status' => 'Selesai',
                'tanggal' => Carbon::parse('2025-09-20'),
            ],
            [
                'program_id' => 3,
                'catatan' => 'Masih tahap perencanaan, anggaran sedang disusun.',
                'status' => 'Berjalan',
                'tanggal' => Carbon::parse('2025-10-01'),
            ],
        ]);
    }
}
