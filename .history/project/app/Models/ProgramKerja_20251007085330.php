<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerja extends Model
{
    use HasFactory;

    protected $table = 'program_kerja';

    protected $fillable = ['nama', 'deskripsi', 'penanggung_jawab', 'status'];

    /**
     * Relasi ke Anggota (penanggung jawab)
     */
    public function penanggungJawab()
    {
        return $this->belongsTo(Anggota::class, 'penanggung_jawab');
    }

    /**
     * Relasi ke Evaluasi
     */
    public function evaluasi()
    {
        return $this->hasMany(Evaluasi::class, 'program_id');
    }

    /**
     * Relasi ke Dokumentasi (jika program punya dokumentasi)
     */
    public function dokumentasi()
    {
        return $this->hasMany(Dokumentasi::class, 'program_id');
    }
}
