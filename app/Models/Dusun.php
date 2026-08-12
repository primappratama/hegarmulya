<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Dusun extends Model
{
    protected $table = 'dusun';
    protected $fillable = ['nama_dusun', 'arah', 'luas_ha', 'jumlah_rt'];
 
    public function mataAir()
    {
        return $this->hasMany(MataAir::class);
    }
}