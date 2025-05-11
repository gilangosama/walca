<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'invoice',
        'user_id',
        'total_price',
        'status',
        'ongkir',
        'grand_total',
        'weight_total',
        'resi',
        'courier',
        'service',
        'estimasi_waktu',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
