<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Sungai extends Model
{
    protected $table = 'sungai';
    protected $fillable = ['nama_sungai', 'keterangan'];
}