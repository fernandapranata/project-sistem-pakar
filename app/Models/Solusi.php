<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solusi extends Model
{
    protected $fillable = ['kerusakan_id', 'kode_solusi', 'solusi'];

    public function kerusakan()
    {
        return $this->belongsTo(Kerusakan::class, 'kerusakan_id');
    }
}