<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
            'name' => 'T-Shirt',
            'description' => 'Comfortable cotton t-shirt',
            'price' => 19.99,
            'stock' => 200,
            'size' => json_encode(['M', 'L', 'XL']),
            'jenis' => json_encode(['Clothing', 'Unisex']),
            'image' => json_encode(['tshirt1.jpg', 'tshirt2.jpg', 'tshirt3.jpg']),
            'color' => json_encode(['White', 'Black', 'Blue']),
            'slug' => 't-shirt',
            'weight' => 0.2,
            ],
            [
            'name' => 'Hoodie',
            'description' => 'Warm fleece hoodie',
            'price' => 34.99,
            'stock' => 150,
            'size' => json_encode(['M', 'L', 'XL']),
            'jenis' => json_encode(['Clothing', 'Outerwear']),
            'image' => json_encode(['hoodie1.jpg', 'hoodie2.jpg']),
            'color' => json_encode(['Black', 'Gray', 'Red']),
            'slug' => 'hoodie',
            'weight' => 0.5,
            ],
            [
            'name' => 'Jeans',
            'description' => 'Classic blue jeans',
            'price' => 39.99,
            'stock' => 120,
            'size' => json_encode(['30', '32', '34']),
            'jenis' => json_encode(['Clothing', 'Bottom']),
            'image' => json_encode(['jeans1.jpg', 'jeans2.jpg']),
            'color' => json_encode(['Blue', 'Black', 'Gray']),
            'slug' => 'jeans',
            'weight' => 0.6,
            ],
            [
            'name' => 'Jacket',
            'description' => 'Windbreaker jacket',
            'price' => 49.99,
            'stock' => 80,
            'size' => json_encode(['M', 'L', 'XL']),
            'jenis' => json_encode(['Clothing', 'Outerwear']),
            'image' => json_encode(['jacket1.jpg', 'jacket2.jpg']),
            'color' => json_encode(['Navy', 'Black', 'Green']),
            'slug' => 'jacket',
            'weight' => 0.7,
            ],
            [
            'name' => 'Dress',
            'description' => 'Elegant summer dress',
            'price' => 29.99,
            'stock' => 60,
            'size' => json_encode(['S', 'M', 'L']),
            'jenis' => json_encode(['Clothing', 'Women']),
            'image' => json_encode(['dress1.jpg', 'dress2.jpg']),
            'color' => json_encode(['Red', 'Blue', 'Yellow']),
            'slug' => 'dress',
            'weight' => 0.3,
            ],
            [
            'name' => 'Sweater',
            'description' => 'Cozy wool sweater',
            'price' => 27.99,
            'stock' => 90,
            'size' => json_encode(['M', 'L', 'XL']),
            'jenis' => json_encode(['Clothing', 'Winter']),
            'image' => json_encode(['sweater1.jpg', 'sweater2.jpg']),
            'color' => json_encode(['Gray', 'White', 'Brown']),
            'slug' => 'sweater',
            'weight' => 0.4,
            ],
            [
            'name' => 'Shorts',
            'description' => 'Casual cotton shorts',
            'price' => 15.99,
            'stock' => 110,
            'size' => json_encode(['M', 'L', 'XL']),
            'jenis' => json_encode(['Clothing', 'Bottom']),
            'image' => json_encode(['shorts1.jpg', 'shorts2.jpg']),
            'color' => json_encode(['Khaki', 'Navy', 'Black']),
            'slug' => 'shorts',
            'weight' => 0.2,
            ],
            [
            'name' => 'Skirt',
            'description' => 'Pleated mini skirt',
            'price' => 22.99,
            'stock' => 70,
            'size' => json_encode(['S', 'M', 'L']),
            'jenis' => json_encode(['Clothing', 'Women']),
            'image' => json_encode(['skirt1.jpg', 'skirt2.jpg']),
            'color' => json_encode(['Pink', 'Black', 'White']),
            'slug' => 'skirt',
            'weight' => 0.25,
            ],
            [
            'name' => 'Polo Shirt',
            'description' => 'Classic polo shirt',
            'price' => 24.99,
            'stock' => 130,
            'size' => json_encode(['M', 'L', 'XL']),
            'jenis' => json_encode(['Clothing', 'Unisex']),
            'image' => json_encode(['polo1.jpg', 'polo2.jpg']),
            'color' => json_encode(['Green', 'White', 'Blue']),
            'slug' => 'polo-shirt',
            'weight' => 0.22,
            ],
            [
            'name' => 'Blazer',
            'description' => 'Formal office blazer',
            'price' => 59.99,
            'stock' => 50,
            'size' => json_encode(['M', 'L', 'XL']),
            'jenis' => json_encode(['Clothing', 'Formal']),
            'image' => json_encode(['blazer1.jpg', 'blazer2.jpg']),
            'color' => json_encode(['Black', 'Navy', 'Gray']),
            'slug' => 'blazer',
            'weight' => 0.6,
            ],
        ]);
    }

}
