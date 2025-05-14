<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    protected $table = "reg_provinces";

    public function regency() {
        return $this->hasMany(Regency::class, 'regency_id', 'id');
    }
}


