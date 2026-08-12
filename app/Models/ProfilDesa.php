<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    protected $fillable = [
        'nama_desa', 'alamat_kantor', 'email',
        'sejarah', 'sejarah_singkat', 'visi', 'misi', 'visi_misi',
        'kecamatan', 'kabupaten', 'provinsi',
        'luas_wilayah_ha', 'ketinggian_min_m', 'ketinggian_max_m',
        'curah_hujan', 'topografi', 'suhu_min', 'suhu_max',
        'jarak_kecamatan_km', 'jarak_kabupaten_km', 'jarak_provinsi_km', 'jarak_ibukota_km',
        'latitude', 'longitude', 'maps_embed_url',
        'kondisi_akses', 'kondisi_sinyal', 'foto_cover',
    ];
}