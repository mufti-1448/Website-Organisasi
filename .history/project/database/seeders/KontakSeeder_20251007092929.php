<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KontakSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kontak')->insert([
            [
                'nama' => 'Organisasi Sekolah',
                'email' => 'organisasi@sekolah.sch.id',
            ],
            [
                'nama' => 'Bendahara',
                'email' => 'bendahara@sekolah.sch.id',
            ]
        ]);
    }
}
