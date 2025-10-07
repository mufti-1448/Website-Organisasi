<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jabatan')->insert([
            ['nama_jabatan' => 'Ketua Umum'],
            ['nama_jabatan' => 'Wakil Ketua'],
            ['nama_jabatan' => 'Sekretaris'],
            ['nama_jabatan' => 'Bendahara']
        ]);
    }
}
