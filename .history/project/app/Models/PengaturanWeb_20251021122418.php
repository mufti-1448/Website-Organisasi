<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengaturanWeb extends Model
{
    protected $table = 'pengaturan_web';

    protected $fillable = ['nama_organisasi', 'logo', 'facebook', 'instagram', 'youtube', 'whatsapp', 'alamat'];
}
