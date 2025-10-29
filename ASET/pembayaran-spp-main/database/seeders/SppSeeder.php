<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataSpp = [
            ['id_spp' => 1, 'tahun' => '2023', 'nominal' => 250000],
            ['id_spp' => 2, 'tahun' => '2024', 'nominal' => 300000],
            ['id_spp' => 3, 'tahun' => '2025', 'nominal' => 350000],
        ];

        foreach ($dataSpp as $item) {
            \App\Models\Spp::updateOrCreate(
                ['id_spp' => $item['id_spp']],
                [
                    'tahun' => $item['tahun'],
                    'nominal' => $item['nominal'],
                ]
            );
        }
    }
}
