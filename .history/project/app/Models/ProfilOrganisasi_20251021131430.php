<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilOrganisasi extends Model
{
    protected $table = 'profil_organisasi';

    protected $fillable = ['nama_organisasi', 'deskripsi', 'visi', 'misi'];
}
