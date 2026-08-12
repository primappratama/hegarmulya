<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Ipm extends Model
{
    protected $table = 'ipm';
    protected $fillable = [
        'tahun', 'indeks_pendidikan', 'indeks_kesehatan', 'indeks_daya_beli',
        'realisasi_ipm', 'target_ipm_kecamatan', 'target_ipm_kabupaten',
    ];
}