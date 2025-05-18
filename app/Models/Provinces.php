<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    protected $table = "provinces";

    public function regency() {
        return $this->hasMany(Regency::class, 'regency_id', 'id');
    }

    public function address()
    {        // Define the relationship with the Address model
        return $this->hasMany(Address::class, 'province_id', 'id');
    }
}


