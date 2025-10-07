<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapat extends Model
{
    use HasFactory;

    protected $table = 'rapat';

    protected $fillable = ['judul', 'tanggal', 'tempat', 'keterangan'];

    /**
     * Relasi ke Notulen
     * Satu rapat bisa punya banyak notulen
     */
    public function notulen()
    {
        return $this->has(Notulen::class, 'rapat_id');
    }

    /**
     * Relasi ke Dokumentasi (jika dokumentasi rapat)
     */
    public function dokumentasi()
    {
        return $this->hasMany(Dokumentasi::class, 'rapat_id');
    }
}
