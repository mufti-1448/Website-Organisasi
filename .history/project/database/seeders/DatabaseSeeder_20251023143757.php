<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AnggotaSeeder::class,
            ProgramKerjaSeeder::class,
            RapatSeeder::class,
            NotulenSeeder::class,
            EvaluasiSeeder::class,
            DokumentasiSeeder::class,
            DashboardSeeder::class,
            KontakSeeder::class,
        ]);
    }
}
