<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $table = 'dokumentasi';

    protected $fillable = ['judul' , 'deskripsi', 'foto', '', 'kategori', 'rapat_id', 'program_id'];

    /**
     * Relasi opsional ke Rapat
     */
    public function rapat()
    {
        return $this->belongsTo(Rapat::class, 'rapat_id');
    }

    /**
     * Relasi opsional ke Program Kerja
     */
    public function programKerja()
    {
        return $this->belongsTo(ProgramKerja::class, 'program_id');
    }
}
