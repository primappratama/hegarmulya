<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class PerangkatDesa extends Model
{
    protected $table = 'perangkat_desa';
    protected $fillable = ['nama', 'jabatan', 'jumlah', 'no_sk', 'tanggal_sk'];
 
    protected $casts = [
        'tanggal_sk' => 'date',
    ];
}