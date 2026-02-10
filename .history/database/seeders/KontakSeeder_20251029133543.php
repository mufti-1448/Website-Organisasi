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
        'email' => 'siti.nurhaliza@email.com',
        'tanggal' => '2024-01-20',
        'pesan' => 'Terima kasih atas informasi yang diberikan. Saya sangat tertarik dengan kegiatan organisasi ini.',
        'status' => 'berlangsung',
        'reply' => null,
        'replied_at' => null,
      ],
      [
        'nama' => 'Budi Santoso',
        'email' => 'budi.santoso@email.com',
        'tanggal' => '2024-01-25',
        'pesan' => 'Apakah ada lowongan untuk bergabung dengan tim? Saya memiliki pengalaman di bidang IT.',
        'status' => 'selesai',
        'reply' => 'Terima kasih atas minat Anda untuk bergabung. Kami akan menghubungi Anda jika ada lowongan yang sesuai dengan background Anda.',
        'replied_at' => '2024-01-26 10:30:00',
      ],
      [
        'nama' => 'Maya Sari',
        'email' => 'maya.sari@email.com',
        'tanggal' => '2024-02-01',
        'pesan' => 'Saya mengalami kesulitan mengakses website organisasi. Apakah ada masalah teknis?',
        'status' => 'belum',
        'reply' => null,
        'replied_at' => null,
      ],
      [
        'nama' => 'Rizki Pratama',
        'email' => 'rizki.pratama@email.com',
        'tanggal' => '2024-02-05',
        'pesan' => 'Selamat atas pencapaian organisasi ini. Saya ingin mengajukan proposal kerjasama.',
        'status' => 'berlangsung',
        'reply' => null,
        'replied_at' => null,
      ],
      [
        'nama' => 'Dewi Lestari',
        'email' => 'dewi.lestari@email.com',
        'tanggal' => '2024-02-10',
        'pesan' => 'Apakah ada jadwal rapat rutin yang bisa saya ikuti? Saya ingin terlibat lebih aktif.',
        'status' => 'selesai',
        'reply' => 'Rapat rutin kami dilaksanakan setiap hari Jumat pukul 15:00 WIB. Anda dipersilakan untuk bergabung.',
        'replied_at' => '2024-02-11 09:15:00',
      ],
      [
        'nama' => 'Fajar Ramadhan',
        'email' => 'fajar.ramadhan@email.com',
        'tanggal' => '2024-02-15',
        'pesan' => 'Saya kehilangan akses ke akun saya. Bagaimana cara mereset password?',
        'status' => 'belum',
        'reply' => null,
        'replied_at' => null,
      ],
      [
        'nama' => 'Nina Amelia',
        'email' => 'nina.amelia@email.com',
        'tanggal' => '2024-02-20',
        'pesan' => 'Terima kasih atas bantuan sebelumnya. Semua sudah berjalan lancar.',
        'status' => 'berlangsung',
        'reply' => null,
        'replied_at' => null,
      ],
      [
        'nama' => 'Hendra Wijaya',
        'email' => 'hendra.wijaya@email.com',
        'tanggal' => '2024-02-25',
        'pesan' => 'Saya ingin memberikan masukan untuk perbaikan website. Apakah ada form khusus?',
        'status' => 'selesai',
        'reply' => 'Terima kasih atas masukannya. Kami telah mencatat dan akan segera menindaklanjuti.',
        'replied_at' => '2024-02-26 14:45:00',
      ],
      [
        'nama' => 'Lina Marlina',
        'email' => 'lina.marlina@email.com',
        'tanggal' => '2024-03-01',
        'pesan' => 'Apakah ada program pelatihan atau workshop yang akan datang?',
        'status' => 'belum',
        'reply' => null,
        'replied_at' => null,
      ],
    ];

    foreach ($kontaks as $kontak) {
      Kontak::create($kontak);
    }
  }
}
