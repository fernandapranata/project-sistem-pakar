<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $fillable = ['kode_gejala', 'nama_gejala'];

    public function kerusakans()
    {
        return $this->belongsToMany(Kerusakan::class, 'gejala_kerusakan', 'gejala_id', 'kerusakan_id');
    }
}