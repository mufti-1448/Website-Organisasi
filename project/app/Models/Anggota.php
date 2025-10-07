<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'anggota';

    // Kolom yang bisa diisi
    protected $fillable = ['nama', 'kelas', 'jabatan', 'kontak', 'foto'];

    /**
     * Relasi ke Notulen
     * Satu anggota bisa menulis banyak notulen
     */
    public function notulen()
    {
        return $this->hasMany(Notulen::class, 'penulis_id');
    }

    /**
     * Relasi ke Program Kerja (penanggung jawab)
     */
    public function programKerja()
    {
        return $this->hasMany(ProgramKerja::class, 'penanggung_jawab');
    }
}
