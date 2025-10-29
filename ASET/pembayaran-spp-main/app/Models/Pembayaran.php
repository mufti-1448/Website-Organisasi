<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'id_pembayaran',
        'nis',
        'tgl_bayar',
        'bulan_dibayar',
        'tahun_dibayar',
        'jumlah_bayar',
        'keterangan',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }

    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp');
    }
}
