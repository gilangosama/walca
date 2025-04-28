<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $fillable = [
        'provinsi_id',
        'name',
        'code',
    ];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
}
