<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'payment_methode',
        'payment_status',
        'transaction_id',
        'paid_at',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
