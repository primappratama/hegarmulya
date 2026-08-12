<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesanKesan extends Model
{
    protected $fillable = [
        'judul', 'narasi', 'nama_penulis',
        'foto', 'tampilkan', 'urutan',
    ];

    protected $casts = [
        'tampilkan' => 'boolean',
    ];
}