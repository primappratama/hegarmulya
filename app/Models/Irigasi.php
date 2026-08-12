<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Irigasi extends Model
{
    protected $table = 'irigasi';
    protected $fillable = ['jenis_pengairan', 'jumlah', 'kondisi', 'keterangan'];
}