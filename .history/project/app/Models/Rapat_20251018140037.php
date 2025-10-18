<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapat extends Model
{
    use HasFactory;

    protected $table = 'rapat';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id', 'judul', 'nama', 'tanggal', 'tempat', 'status'];

    public function notulen()
    {
        return $this->hasOne(Notulen::class, 'rapat_id', 'id');
    }

    public function dokumentasi()
    {
        return $this->hasOne(Dokumentasi::class, 'rapat_id', 'id');
    }


}
