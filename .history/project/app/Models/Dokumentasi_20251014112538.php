<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $table = 'dokumentasi';
    protected $fillable = ['rapat_id', 'judul', 'deskripsi', 'foto', 'tanggal', 'kategori'];

    public function rapat()
    {
        return $this->belongsTo(Rapat::class, 'rapat_id', 'id');
    }
}
