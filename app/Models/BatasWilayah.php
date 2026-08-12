<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class BatasWilayah extends Model
{
    protected $table = 'batas_wilayah';
    protected $fillable = ['arah', 'keterangan'];
}