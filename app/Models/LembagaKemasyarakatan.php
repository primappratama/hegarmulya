<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class LembagaKemasyarakatan extends Model
{
    protected $table = 'lembaga_kemasyarakatan';
    protected $fillable = ['tahun', 'nama_lembaga', 'jumlah_pengurus'];
}