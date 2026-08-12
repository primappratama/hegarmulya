<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = ['judul', 'slug', 'konten', 'foto', 'tanggal'];

    protected $casts = [
        'tanggal' => 'date',
    ];
}