<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class SaranaKesehatan extends Model
{
    protected $table = 'sarana_kesehatan';
    protected $fillable = ['jenis', 'jumlah', 'tahun'];
}