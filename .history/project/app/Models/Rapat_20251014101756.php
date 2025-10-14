namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapat extends Model
{
use HasFactory;

protected $table = 'rapat';
protected $primaryKey = 'id';
public $incrementing = false; // karena id bukan auto increment
protected $keyType = 'string';

protected $fillable = [
'id',
'judul',
'tanggal',
'tempat',
'status',
'jumlah_peserta',
];

// Relasi ke Notulen (1 rapat punya 1 notulen)
public function notulen()
{
return $this->hasOne(Notulen::class, 'rapat_id', 'id');
}

// Relasi ke Dokumentasi (1 rapat punya banyak foto)
public function dokumentasi()
{
return $this->hasMany(Dokumentasi::class, 'rapat_id', 'id');
}
}
