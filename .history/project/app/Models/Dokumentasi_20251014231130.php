<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $table = 'dokumentasi';
    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
        'tanggal',
        'kategori',
        'rapat_id',
        'program_id',
    ];
    public function rapat()
    {
        return $this->belongsTo(Rapat::class, 'rapat_id', 'id');
    }
}
