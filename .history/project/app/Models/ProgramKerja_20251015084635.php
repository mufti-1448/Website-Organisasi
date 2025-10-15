<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerja extends Model
{
    use HasFactory;

    protected $table = 'program_kerja';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'nama',
        'deskripsi',
        'penanggung_jawab_id',
        'status',
    ];

    // Relasi ke Anggota (penanggung jawab)
    public function penanggungJawab()
    {
        return $this->belongsTo(Anggota::class, 'penanggung_jawab_id');
    }

    // Relasi ke Evaluasi
    public function evaluasi()
    {
        return $this->hasMany(Evaluasi::class, 'program_id');
    }

    // Relasi ke Dokumentasi
    public function dokumentasi()
    {
        return $this->hasMany(Dokumentasi::class, 'program_id');
    }

    // Relasi ke Notulen (jika suatu program punya catatan)
    public function notulen()
    {
        return $this->hasMany(Notulen::class, 'program_id', 'id');
    }
}
