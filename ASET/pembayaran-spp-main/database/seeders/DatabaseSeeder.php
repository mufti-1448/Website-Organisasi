<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@codepelita.com',
            'password' => bcrypt('password123'),
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@codepelita.com',
            'password' => bcrypt('user123'),
        ]);
        $this->call([
            SppSeeder::class,
            KelasSeeder::class,
            SiswaSeeder::class,
        ]);
    }
}
