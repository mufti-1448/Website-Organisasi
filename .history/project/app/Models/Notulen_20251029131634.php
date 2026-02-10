<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notulen extends Model
{
    use HasFactory;

    protected $table = 'notulen';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'rapat_id',
        'judul',
        'isi',
        'tanggal',
        'waktu',
        'penulis_id',
        'file_path',
        'program_id',
    ];

    public function rapat()
    {
        return $this->belongsTo(Rapat::class, 'rapat_id', 'id');
    }

    public function penulis()
    {
        return $this->belongsTo(Anggota::class, 'penulis_id');
    }

    public function penulisRelation()
    {
        return $this->belongsTo(Anggota::class, 'penulis_id');
    }

    public function programKerja()
    {
        return $this->belongsTo(ProgramKerja::class, 'program_id', 'id');
    }
}
