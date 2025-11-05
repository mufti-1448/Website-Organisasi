<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin utama
        User::firstOrCreate([
            'email' => 'mufti0480@gmail.com',
        ], [
            'name' => 'MUFTI404',
            'password' => Hash::make('mufti404'),
            'is_admin' => true,
        ]);

        // Admin tambahan (opsional, uncomment jika perlu)
        /*
        User::firstOrCreate([
            'email' => 'admin2@organisasi.com',
        ], [
            'name' => 'Admin Kedua',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        User::firstOrCreate([
            'email' => 'admin3@organisasi.com',
        ], [
            'name' => 'Admin Ketiga',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);
        */
    }
}
