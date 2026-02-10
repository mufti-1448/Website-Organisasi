<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilOrganisasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_organisasi',
        'deskripsi',
        'visi',
        'misi',
        'alamat',
        'telepon',
        'email',
    ];
}
