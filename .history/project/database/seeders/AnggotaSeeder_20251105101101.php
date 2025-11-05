<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Anggota;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Anggota::create([
            'id' => 'AGT001',
            'nama' => 'Mala Sari',
            'email' => 'mala@example.com',
            'kelas' => 'XII PPLG 2',
            'jabatan' => 'Ketua',
            'kontak' => '081234567890',
            'alamat' => 'Jl. Contoh No. 1',
            'foto' => 'uploads/anggota/1760794533_agt001_mala.png',
        ]);

        Anggota::create([
            'id' => 'AGT002',
            'nama' => 'Ahmad Fauzi',
            'email' => 'ahmad@example.com',
            'kelas' => 'XII PPLG 2',
            'jabatan' => 'Wakil Ketua',
            'kontak' => '081234567891',
            'alamat' => 'Jl. Contoh No. 2',
            'foto' => null,
        ]);

        Anggota::create([
            'id' => 'AGT003',
            'nama' => 'Siti Nurhaliza',
            'kelas' => 'XII PPLG 2',
            'jabatan' => 'Sekretaris',
            'kontak' => '081234567892',
            'foto' => null,
        ]);

        Anggota::create([
            'id' => 'AGT004',
            'nama' => 'Budi Santoso',
            'kelas' => 'XII PPLG 2',
            'jabatan' => 'Bendahara',
            'kontak' => '081234567893',
            'foto' => null,
        ]);

        Anggota::create([
            'id' => 'AGT005',
            'nama' => 'Maya Sari',
            'kelas' => 'XII PPLG 2',
            'jabatan' => 'Anggota',
            'kontak' => '081234567894',
            'foto' => null,
        ]);
    }
}
