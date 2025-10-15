<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    use HasFactory;

    protected $table = 'evaluasi';

    protected $fillable = ['program_id', 'catatan', 'status', 'tanggal', 'file_path'];

    /**
     * Relasi ke Program Kerja
     */
    public function program()
    {
        return $this->belongsTo(ProgramKerja::class, 'program_id');
    }
}
