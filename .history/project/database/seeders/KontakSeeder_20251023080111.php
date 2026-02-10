<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kontak;
use Carbon\Carbon;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kontak::create([
            'nama' => 'Ahmad Fauzi',
            'email' => 'ahmad.fauzi@example.com',
            'pesan' => 'Saya ingin bertanya tentang program kerja organisasi.',
            'tanggal' => Carbon::now()->subDays(5)->toDateString(),
            'status' => 'baru',
        ]);

        Kontak::create([
            'nama' => 'Siti Nurhaliza',
            'email' => 'siti.nurhaliza@example.com',
            'pesan' => 'Apakah ada lowongan anggota baru?',
            'tanggal' => Carbon::now()->subDays(3)->toDateString(),
            'status' => 'dibaca',
        ]);

        Kontak::create([
            'nama' => 'Budi Santoso',
            'email' => 'budi.santoso@example.com',
            'pesan' => 'Terima kasih atas informasi yang diberikan.',
            'tanggal' => Carbon::now()->subDays(7)->toDateString(),
            'status' => 'dibaca',
            'reply' => 'Sama-sama, silakan hubungi kami jika ada pertanyaan lain.',
            'replied_at' => Carbon::now()->subDays(6)->toDateTimeString(),
        ]);

        Kontak::create([
            'nama' => 'Maya Sari',
            'email' => 'maya.sari@example.com',
            'pesan' => 'Kapan acara rapat berikutnya?',
            'tanggal' => Carbon::now()->subDays(1)->toDateString(),
            'status' => 'baru',
        ]);

        Kontak::create([
            'nama' => 'Rizki Pratama',
            'email' => 'rizki.pratama@example.com',
            'pesan' => 'Saya tertarik dengan dokumentasi kegiatan.',
            'tanggal' => Carbon::now()->subDays(2)->toDateString(),
            'status' => 'dibaca',
        ]);
    }
}
