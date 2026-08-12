<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class SejarahKepalaDesa extends Model
{
    protected $table = 'sejarah_kepala_desa';
    protected $fillable = ['periode_mulai', 'periode_selesai', 'nama_kepala_desa', 'status', 'pencapaian'];
}