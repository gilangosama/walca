<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table = 'reg_villages';

    public function districts()
    {
        return $this->belongsTo(District::class);
    }
}
