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
                'pesan' => 'Terima kasih atas dukungan terhadap kegiatan organisasi kami.',
                'tanggal' => now(),
                'status' => 'baru',
            ],
            [
                'nama' => 'Bendahara',
                'email' => 'bendahara@sekolah.sch.id',
                'pesan' => 'Laporan keuangan bulan ini telah selesai dibuat.',
                'tanggal' => now(),
                'status' => 'dibaca',
            ],
        ]);
    }
}
