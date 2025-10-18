<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $table = 'dokumentasi';
    protected $fillable = ['judul', 'deskripsi', 'tanggal', 'kategori', 'foto', 'rapat_id'];
}
