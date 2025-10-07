<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnggotaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('anggota')->insert([
            [
                'nama' => 'Ali Rahman',
                'kelas' => 'XII PPLG 2',
                'jabatan_id' => 1, // Ketua Umum
                'divisi_id' => 1,  // Humas
                'email' => 'ali.rahman@sekolah.sch.id',
                'no_telp' => '08123456789'
            ],
            [
                'nama' => 'Siti Aminah',
                'kelas' => 'XI PPLG 1',
                'jabatan_id' => 2, // Wakil Ketua
                'divisi_id' => 2,  // Acara
                'email' => 'siti.aminah@sekolah.sch.id',
                'no_telp' => '08198765432'
            ],
            [
                'nama' => 'Budi Santoso',
                'kelas' => 'XII TKJ 1',
                'jabatan_id' => 3, // Sekretaris
                'divisi_id' => 3,  // Perlengkapan
                'email' => 'budi.santoso@sekolah.sch.id',
                'no_telp' => '082233445566'
            ],
            [
                'nama' => 'Rina Lestari',
                'kelas' => 'XI RPL 1',
                'jabatan_id' => 4, // Bendahara
                'divisi_id' => 4,  // Media & Dokumentasi
                'email' => 'rina.lestari@sekolah.sch.id',
                'no_telp' => '083355779900'
            ]
        ]);
    }
}
