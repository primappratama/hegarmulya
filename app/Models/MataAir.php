<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class MataAir extends Model
{
    protected $table = 'mata_air';
    protected $fillable = ['dusun_id', 'nama_mata_air'];
 
    public function dusun()
    {
        return $this->belongsTo(Dusun::class);
    }
}