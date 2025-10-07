<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnggotaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('anggota')->insert([
            [
                'nama' => 'Ali Rahman',
                'kelas' => 'XII PPLG 2',
                'jabatan' => 'Ketua Umum',
                'kontak' => '08123456789',
                'foto' => 'ali.jpg',
                
            ],
            [
                'nama' => 'Siti Aminah',
                'kelas' => 'XI PPLG 1',
                'jabatan' => 'Sekretaris',
                'kontak' => '08198765432',
                'foto' => 'siti.jpg',
            ],
            [
                'nama' => 'Budi Santoso',
                'kelas' => 'XII TKJ 1',
                'jabatan' => 'Bendahara',
                'kontak' => '082233445566',
                'foto' => 'budi.jpg',
            ],
        ]);
    }
}
