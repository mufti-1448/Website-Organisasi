<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataKelas = [
            ['id_kelas' => 'KLS001', 'nama_kelas' => 'XRPL', 'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak'],
            ['id_kelas' => 'KLS002', 'nama_kelas' => 'XTKJ', 'kompetensi_keahlian' => 'Teknik Komputer dan Jaringan'],
            ['id_kelas' => 'KLS003', 'nama_kelas' => 'XTKR', 'kompetensi_keahlian' => 'Teknik Kendaraan Ringan'],
            ['id_kelas' => 'KLS004', 'nama_kelas' => 'XTSM', 'kompetensi_keahlian' => 'Teknik Sepeda Motor'],
            ['id_kelas' => 'KLS005', 'nama_kelas' => 'XDPB', 'kompetensi_keahlian' => 'Desain Produksi Busana'],
        ];

        foreach ($dataKelas as $item) {
            \App\Models\Kelas::updateOrCreate(
                ['id_kelas' => $item['id_kelas']],
                [
                    'nama_kelas' => $item['nama_kelas'],
                    'kompetensi_keahlian' => $item['kompetensi_keahlian'],
                ]
            );
        }
    }
}
