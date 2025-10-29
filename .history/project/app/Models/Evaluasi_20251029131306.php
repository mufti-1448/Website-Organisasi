<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    use HasFactory;

    protected $table = 'evaluasi';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = ['id', 'program_id', 'judul', 'isi', 'tanggal', 'penulis', 'file'];

    /**
     * Relasi ke Program Kerja
     */
    public function programKerja()
    {
        return $this->belongsTo(ProgramKerja::class, 'program_id');
    }

    /**
     * Relasi ke Anggota (Penulis)
     */
    public function penulisRelation()
    {
        return $this->belongsTo(Anggota::class, 'penulis');
    }
}
