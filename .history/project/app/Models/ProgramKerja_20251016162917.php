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



    public function notulen()
    {
        return $this->hasMany(Notulen::class, 'program_id', 'id');
    }

    public function notulenUtama()
    {
        return $this->hasOne(Notulen::class, 'program_id', 'id')->latestOfMany();
    }
}
