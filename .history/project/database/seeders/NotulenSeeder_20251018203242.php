 spakai<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Notulen;

class NotulenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Notulen::create([
            'id' => 'NOT001',
            'rapat_id' => 'RPT001',
            'judul' => 'Notulen Rapat Evaluasi Bulanan',
            'isi' => 'Rapat dimulai pukul 08:00 WIB. Agenda utama adalah evaluasi kegiatan bulan lalu. Diskusi tentang pencapaian target dan rencana ke depan.',
            'tanggal' => '2025-10-01',
            'penulis_id' => 'AGT001',
            'file_path' => null,
        ]);

        Notulen::create([
            'id' => 'NOT002',
            'rapat_id' => 'RPT002',
            'judul' => 'Notulen Rapat Perencanaan Kegiatan',
            'isi' => 'Rapat membahas perencanaan kegiatan semester depan. Fokus pada program kreativitas siswa dan pendidikan karakter.',
            'tanggal' => '2025-10-15',
            'penulis_id' => 'AGT002',
            'file_path' => null,
        ]);

        Notulen::create([
            'id' => 'NOT003',
            'rapat_id' => 'RPT003',
            'judul' => 'Notulen Rapat Koordinasi Anggota',
            'isi' => 'Koordinasi antara anggota tim untuk memastikan kelancaran program kerja. Pembagian tugas dan deadline yang jelas.',
            'tanggal' => '2025-11-01',
            'penulis_id' => 'AGT003',
            'file_path' => null,
    }
}
