<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'reg_districts';

    public function regency() {
        return $this->belongsTo(Regency::class, 'regency_id', 'id');
    }




}
