<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SosialMedia;

class DashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
