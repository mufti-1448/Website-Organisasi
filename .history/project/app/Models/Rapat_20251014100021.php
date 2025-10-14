<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dokumentasi;
use App\Models\Notulen;

class Rapat extends Model
{
    use HasFactory;

    protected $table = 'rapat';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'judul',
        'tanggal',
        'tempat',
        'status',
        'jumlah_peserta',
    ];
$r = App\Models\Rapat::find('RPT001');
$r->status = 'selesai';
$r->save();


    /**
     * Relasi ke Notulen
     * Satu rapat bisa memiliki banyak notulen
     */
    public function notulen()
    {
        return $this->hasOne(Notulen::class, 'rapat_id');
    }

    /**
     * Relasi ke Dokumentasi (jika dokumentasi rapat)
     */
    public function dokumentasi()
    {
        return $this->hasMany(Dokumentasi::class, 'rapat_id');
    }
}
