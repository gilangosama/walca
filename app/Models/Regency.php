<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Regency extends Model
{
    protected $table = 'reg_regencies';

    public function provinces() {
        return $this->belongsTo(provinces::class, 'regency_id', 'id');
    }

    public function district() {
        return $this->hasMany(District::class, 'district_id', 'id');
    }
}
