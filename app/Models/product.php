<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'size',
        'jenis',
        'image',
        'color',
        'slug',
        'weight',
    ];

    protected $casts = [
        'jenis' => 'array',
        'size' => 'array',
        'image' => 'array',
        'color' => 'array',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories'); // Correct table name
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
