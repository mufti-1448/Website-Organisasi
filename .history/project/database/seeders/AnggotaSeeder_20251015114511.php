<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anggota;

class AnggotaSeeder extends Seeder
{
    public function run()
    {
        Anggota::create([
            'id' => 'AGT001',
            'nama' => 'Ahmad Fauzi',
            'kelas' => 'XII RPL',
            'jabatan' => 'Ketua',
            'kontak' => '081234567890',
            'foto' => null,
        ]);

        Anggota::create([
            'id' => 'AGT002',
            'nama' => 'Siti Nurhaliza',
            'kelas' => 'XII RPL',
