<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotulenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('notulen')->insert([
            [
                'rapat_id' => 1,
                'penulis_id' => 1,
                'isi' => 'Rapat membahas pembagian tugas panitia dan anggaran biaya kegiatan.',
                'tanggal' => '2025-09-15'
            ],
            [
                'rapat_id' => 2,
                'penulis_id' => 2,
                'isi' => 'Rapat meninjau hasil kegiatan dan perencanaan program tahun depan.',
                'tanggal' => '2025-12-20'
            ]
        ]);
    }
}
