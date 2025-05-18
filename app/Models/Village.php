<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table = 'villages';

    public function districts()
    {
        return $this->belongsTo(District::class);
    }

    public function address()
    {
        // Define the relationship or logic for address here
        return $this->hasMany(Address::class, 'village_id', 'id');
    }
}
