<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evaluasi;

class EvaluasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Evaluasi::create([
            'program_id' => 1,
            'judul' => 'Evaluasi Program Sosialisasi',
            'isi' => 'Pelaksanaan berjalan baik, namun partisipasi masih perlu ditingkatkan. Anggaran yang digunakan sesuai dengan rencana, namun ada beberapa kendala dalam koordinasi antar anggota.',
            'tanggal' => '2025-10-15',
            'penulis' => 'Admin',
            'file' => null,
        ]);

        Evaluasi::create([
            'program_id' => 2,
            'judul' => 'Evaluasi Program Pelatihan',
            'isi' => 'Program pelatihan berhasil meningkatkan kompetensi anggota. Materi yang disampaikan relevan dengan kebutuhan organisasi. Saran untuk kedepannya adalah menambah durasi pelatihan.',
            'tanggal' => '2025-10-20',
            'penulis' => 'Koordinator',
            'file' => null,
        ]);

        Evaluasi::create([
            'program_id' => 3,
            'judul' => 'Evaluasi Program Bakti Sosial',
            'isi' => 'Program bakti sosial mendapat sambutan positif dari masyarakat. Koordinasi dengan pihak terkait berjalan lancar. Perlu ditingkatkan promosi untuk program selanjutnya.',
            'tanggal' => '2025-10-25',
            'penulis' => 'Sekretaris',
            'file' => null,
        ]);
    }
}
