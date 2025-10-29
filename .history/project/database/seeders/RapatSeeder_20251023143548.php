<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rapat;
use Carbon\Carbon;

class RapatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rapat::create([
            'id' => 'RPT001',
            'judul' => 'Rapat Pembentukan Program Kerja',
            'nama' => 'Rapat Pembentukan Program Kerja',
            'tanggal' => Carbon::now()->subDays(30)->toDateString(),
            'waktu' => '08:00:00',
            'tempat' => 'Ruang Rapat Sekolah',
            'status' => 'selesai',
        ]);

        Rapat::create([
            'id' => 'RPT002',
            'judul' => 'Rapat Evaluasi Kegiatan Bulanan',
            'nama' => 'Rapat Evaluasi Kegiatan Bulanan',
            'tanggal' => Carbon::now()->subDays(15)->toDateString(),
            'waktu' => '10:00:00',
            'tempat' => 'Aula Sekolah',
            'status' => 'selesai',
        ]);

        Rapat::create([
            'id' => 'RPT003',
            'judul' => 'Rapat Perencanaan Acara Tahunan',
            'nama' => 'Rapat Perencanaan Acara Tahunan',
            'tanggal' => Carbon::now()->addDays(7)->toDateString(),
            'waktu' => '14:00:00',
            'tempat' => 'Ruang Guru',
            'status' => 'belum',
        ]);

        Rapat::create([
            'id' => 'RPT004',
            'judul' => 'Rapat Koordinasi dengan Guru Pembimbing',
            'nama' => 'Rapat Koordinasi dengan Guru Pembimbing',
            'tanggal' => Carbon::now()->addDays(14)->toDateString(),
            'waktu' => '09:00:00',
            'tempat' => 'Ruang OSIS',
            'status' => 'belum',
        ]);

        Rapat::create([
            'id' => 'RPT005',
            'judul' => 'Rapat Darurat Penanganan Masalah',
            'nama' => 'Rapat Darurat Penanganan Masalah',
            'tanggal' => Carbon::now()->toDateString(),
            'waktu' => '16:00:00',
            'tempat' => 'Ruang Rapat Sekolah',
            'status' => 'berlangsung',
        ]);
    }
}
