<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kontak;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kontaks = [
            [
                'nama' => 'Ahmad Surya',
                'email' => 'ahmad.surya@email.com',
                'tanggal' => '2024-01-15',
                'pesan' => 'Saya ingin bertanya tentang program kerja yang akan datang. Apakah ada informasi lebih lanjut?',
                'status' => 'belum',
                'reply' => null,
                'replied_at' => null,
            ],
            [
                'nama' => 'Siti Nurhaliza',
