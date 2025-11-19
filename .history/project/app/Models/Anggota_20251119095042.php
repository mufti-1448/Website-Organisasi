<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    protected $primaryKey = 'id';
    public $incrementing = false;        // Supaya Eloquent tahu id bukan auto-increment
    protected $keyType = 'string';       // Karena id bertipe string [web:97]
    protected $fillable = ['nama', 'email', 'kontak', 'kelas', 'jabatan', 'alamat', 'foto'];

    public function notulen()
    {
        return $this->hasMany(Notulen::class, 'penulis_id');
    }
    public function evaluasi()
    {
        return $this->hasMany(Evaluasi::class, 'penulis');
    }
    public function programKerja()
    {
        return $this->hasMany(ProgramKerja::class, 'penanggung_jawab_id');
    }
}
