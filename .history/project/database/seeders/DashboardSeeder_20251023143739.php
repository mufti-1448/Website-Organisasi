<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProfilOrganisasi;
use App\Models\PengaturanWeb;
use App\Models\Carousel;
use App\Models\TentangKami;
use App\Models\SosialMedia;\

class DashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Profil Organisasi
        ProfilOrganisasi::create([
            'nama_organisasi' => 'Organisasi Siswa XII PPLG 2',
            'deskripsi' => 'Organisasi siswa yang berfokus pada pengembangan keterampilan teknologi informasi dan komunikasi untuk siswa kelas XII PPLG 2.',
            'visi' => 'Menjadi organisasi siswa yang unggul dalam bidang teknologi dan mampu berkontribusi positif bagi sekolah dan masyarakat.',
            'misi' => '1. Mengembangkan keterampilan siswa di bidang IT\n2. Meningkatkan kreativitas dan inovasi\n3. Membina solidaritas antar siswa\n4. Berkontribusi untuk kemajuan sekolah',
            'alamat' => 'SMK Negeri 1 Kota Contoh',
            'telepon' => '021-12345678',
            'email' => 'organisasi@pplg2.sch.id',
        ]);

        // Pengaturan Web
        PengaturanWeb::create([
            'nama_website' => 'Website Organisasi XII PPLG 2',
            'deskripsi_website' => 'Website resmi organisasi siswa XII PPLG 2 untuk informasi dan dokumentasi kegiatan.',
            'logo' => 'uploads/logo/logo.png',
            'favicon' => 'uploads/favicon/favicon.ico',
            'meta_title' => 'Organisasi Siswa XII PPLG 2',
            'meta_description' => 'Website resmi organisasi siswa XII PPLG 2 - SMK Negeri 1 Kota Contoh',
            'keywords' => 'organisasi siswa, XII PPLG 2, SMK, teknologi informasi',
            'author' => 'Tim IT Organisasi XII PPLG 2',
        ]);

        // Carousel
        Carousel::create([
            'judul' => 'Selamat Datang di Website Organisasi',
            'deskripsi' => 'Website resmi organisasi siswa XII PPLG 2 untuk informasi kegiatan dan program kerja.',
            'gambar' => 'uploads/carousel/welcome.jpg',
            'urutan' => 1,
            'aktif' => true,
        ]);

        Carousel::create([
            'judul' => 'Program Kerja Unggulan',
            'deskripsi' => 'Berbagai program kerja menarik untuk pengembangan siswa di bidang teknologi.',
            'gambar' => 'uploads/carousel/programs.jpg',
            'urutan' => 2,
            'aktif' => true,
        ]);

        Carousel::create([
            'judul' => 'Prestasi dan Pencapaian',
            'deskripsi' => 'Mencatat berbagai prestasi dan pencapaian organisasi dalam berbagai kegiatan.',
            'gambar' => 'uploads/carousel/achievements.jpg',
            'urutan' => 3,
            'aktif' => true,
        ]);

        // Tentang Kami
        TentangKami::create([
            'judul' => 'Tentang Organisasi Kami',
            'konten' => 'Organisasi Siswa XII PPLG 2 adalah wadah bagi siswa kelas XII Program Keahlian Pengembangan Perangkat Lunak dan Gim untuk berkembang dan berkontribusi. Kami berkomitmen untuk menciptakan lingkungan yang kondusif bagi pengembangan potensi siswa di bidang teknologi informasi.',
            'gambar' => 'uploads/tentang_kami/about.jpg',
            'aktif' => true,
        ]);

        // Sosial Media
        SosialMedia::create([
            'platform' => 'Instagram',
            'url' => 'https://instagram.com/pplg2_org',
            'ikon' => 'fab fa-instagram',
            'aktif' => true,
        ]);

        SosialMedia::create([
            'platform' => 'Facebook',
            'url' => 'https://facebook.com/pplg2.organisasi',
            'ikon' => 'fab fa-facebook',
            'aktif' => true,
        ]);

        SosialMedia::create([
            'platform' => 'Twitter',
            'url' => 'https://twitter.com/pplg2_org',
            'ikon' => 'fab fa-twitter',
            'aktif' => true,
        ]);

        SosialMedia::create([
            'platform' => 'YouTube',
            'url' => 'https://youtube.com/channel/pplg2',
            'ikon' => 'fab fa-youtube',
            'aktif' => true,
        ]);

        SosialMedia::create([
            'platform' => 'LinkedIn',
            'url' => 'https://linkedin.com/company/pplg2-organisasi',
            'ikon' => 'fab fa-linkedin',
            'aktif' => true,
        ]);
    }
}
