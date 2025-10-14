<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notulen extends Model
{
    use HasFactory;

    protected $table = 'notulen';
    protected $fillable = ['rapat_id', 'isi', 'tanggal', 'penulis_id'];

    public function rapat()
    {
        return $this->belongsTo(Rapat::class, 'rapat_id', 'id');
    }

    public function penulis()
    {
        return $this->belongsTo(Anggota::class, 'penulis_id');
    }
    
}
