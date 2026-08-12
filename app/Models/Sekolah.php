<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Sekolah extends Model
{
    protected $table = 'sekolah';
    protected $fillable = ['nama_sekolah', 'jenjang', 'status', 'dusun_id', 'jumlah_murid', 'jumlah_guru'];
 
    public function dusun()
    {
        return $this->belongsTo(Dusun::class);
    }
}