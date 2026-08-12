<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrukturPemerintahan extends Model
{
    protected $fillable = ['parent_id', 'nama', 'jabatan', 'foto', 'urutan'];

    public function parent()
    {
        return $this->belongsTo(StrukturPemerintahan::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(StrukturPemerintahan::class, 'parent_id')->orderBy('urutan');
    }
}