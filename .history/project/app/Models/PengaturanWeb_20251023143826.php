<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaturanWeb extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_website',
        'deskripsi_website',
        'logo',
        'favicon',
        'meta_title',
        'meta_description',
        'keywords',
        'author',
    ];
}
