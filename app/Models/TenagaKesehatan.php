<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class TenagaKesehatan extends Model
{
    protected $table = 'tenaga_kesehatan';
    protected $fillable = ['tahun', 'jenis_tenaga', 'jumlah'];
}