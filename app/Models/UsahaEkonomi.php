<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class UsahaEkonomi extends Model
{
    protected $table = 'usaha_ekonomi';
    protected $fillable = ['jenis_usaha', 'sub_jenis', 'jumlah', 'tahun'];
}