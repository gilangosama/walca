<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'subtotal', // Added subtotal
    ];

    protected static function booted()
    {
        static::saving(function ($orderItem) {
            $orderItem->subtotal = $orderItem->quantity * $orderItem->price; // Auto-calculate subtotal
        });
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
