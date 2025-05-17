<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
        'user_id',
        'name',
        'no_telp',
        'label',
        'country',
        'street',
        'detail',
        'provinces',
        'regency',
        'district',
        'village',
        'postal_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function provinces()
    {
        return $this->belongsTo(Provinces::class, 'provinces');
    }

    
}
