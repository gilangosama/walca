<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    public function regency() {
        return $this->belongsTo(Regency::class, 'regency_id', 'id');
    }

    public function address()
    {
        return $this->hasMany(Address::class, 'district_id', 'id');
    }




}
