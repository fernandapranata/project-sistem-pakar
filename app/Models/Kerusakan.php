<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{
    protected $fillable = ['kode_kerusakan', 'nama_kerusakan'];

    public function gejalas()
    {
        return $this->belongsToMany(Gejala::class, 'gejala_kerusakan', 'kerusakan_id', 'gejala_id');
    }

    public function solusis()
    {
        return $this->hasMany(Solusi::class, 'kerusakan_id');
    }
}
