<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerja extends Model
{
    use HasFactory;

    protected $table = 'program_kerja';

    protected $fillable = [
        'nama',
        'deskripsi',
        'penanggung_jawab_id',
        'status',
    ];

    /**
     * 🔗 Relasi ke Anggota (penanggung jawab program kerja)
     * Setiap program kerja memiliki satu penanggung jawab.
     */
    public function penanggungJawab()
    {
        return $this->belongsTo(Anggota::class, 'penanggung_jawab_id');
    }

    /**
     * 📊 Relasi ke Evaluasi
     * Satu program kerja bisa memiliki banyak evaluasi.
     */
    public function evaluasi()
    {
        return $this->hasMany(Evaluasi::class, 'program_id');
    }

    /**
     * 🖼️ Relasi ke Dokumentasi
     * Satu program kerja bisa memiliki banyak dokumentasi.
     */
    public function dokumentasi()
    {
        return $this->hasMany(Dokumentasi::class, 'program_id');
    }
}
