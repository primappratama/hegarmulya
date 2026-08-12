<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class FasilitasDesa extends Model
{
    protected $table = 'fasilitas_desa';
    protected $fillable = ['kategori', 'jenis', 'jumlah', 'satuan'];
}