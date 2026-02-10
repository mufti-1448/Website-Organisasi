<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        $kelasIds = ['KLS001', 'KLS002', 'KLS003', 'KLS004', 'KLS005'];
        $nisns = [];
        $niss = [];

        for ($i = 0; $i < 20; $i++) {
            // Pastikan NISN dan NIS unik
            do {
                $nisn = $faker->unique()->numerify('##########');
            } while (in_array($nisn, $nisns));

            do {
                $nis = $faker->unique()->numerify('########');
            } while (in_array($nis, $niss));

            $nisns[] = $nisn;
            $niss[] = $nis;

            Siswa::create([
                'nisn' => $nisn,
                'nis' => $nis,
                'nama' => $faker->name(),
                'id_kelas' => $faker->randomElement($kelasIds),
                'alamat' => $faker->address(),
                'no_telp' => $faker->numerify('08##########'),
                'id_spp' => $faker->numberBetween(1, 3),
            ]);
        }
    }
}
