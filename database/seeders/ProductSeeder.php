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
                'name' => 'Smartphone',
                'description' => 'Latest model smartphone',
                'price' => 699.99,
                'stock' => 50,
                'size' => json_encode([
                    'M',
                    'L',
                    'XL',
                ]),
                'jenis' => 'Gadget',
                'image' => 'smartphone.jpg',
                'color' => 'Black',
                'slug' => 'smartphone',
                'weight' => 0.5,
            ],
            [
                'name' => 'T-Shirt',
                'description' => 'Comfortable cotton t-shirt',
                'price' => 19.99,
                'stock' => 200,
                'size' => json_encode([
                    'M',
                    'L',
                    'XL',
                ]),
                'jenis' => 'Clothing',
                'image' => 'tshirt.jpg',
                'color' => 'White',
                'slug' => 't-shirt',
                'weight' => 0.2,
            ],
            [
                'name' => 'Laptop',
                'description' => 'High-performance laptop',
                'price' => 999.99,
                'stock' => 30,
                'size' => json_encode([
                    'M',
                    'L',
                    'XL',
                ]),
                'jenis' => 'Gadget',
                'image' => 'laptop.jpg',
                'color' => 'Silver',
                'slug' => 'laptop',
                'weight' => 2.5,
            ],
            [
                'name' => 'Headphones',
                'description' => 'Noise-cancelling headphones',
                'price' => 199.99,
                'stock' => 100,
                'size' => json_encode([
                    'M',
                    'L',
                    'XL',
                ]),
                'jenis' => 'Accessory',
                'image' => 'headphones.jpg',
                'color' => 'Black',
                'slug' => 'headphones',
                'weight' => 0.3,
            ],
            [
                'name' => 'Refrigerator',
                'description' => 'Energy-efficient refrigerator',
                'price' => 499.99,
                'stock' => 20,
                'size' => 'Large',
                'jenis' => 'Appliance',
                'image' => 'refrigerator.jpg',
                'color' => 'White',
                'slug' => 'refrigerator',
                'weight' => 50,
            ],
            [
                'name' => 'Microwave',
                'description' => 'Compact microwave oven',
                'price' => 99.99,
                'stock' => 40,
                'size' => 'Medium',
                'jenis' => 'Appliance',
                'image' => 'microwave.jpg',
                'color' => 'Black',
                'slug' => 'microwave',
                'weight' => 10,
            ],
            [
                'name' => 'Sneakers',
                'description' => 'Comfortable running sneakers',
                'price' => 59.99,
                'stock' => 150,
                'size' => 'Various',
                'jenis' => 'Footwear',
                'image' => 'sneakers.jpg',
                'color' => 'Blue',
                'slug' => 'sneakers',
                'weight' => 1,
            ],
            [
                'name' => 'Watch',
                'description' => 'Stylish wristwatch',
                'price' => 149.99,
                'stock' => 80,
                'size' => 'One Size',
                'jenis' => 'Accessory',
                'image' => 'watch.jpg',
                'color' => 'Gold',
                'slug' => 'watch',
                'weight' => 0.2,
            ],
            [
                'name' => 'Backpack',
                'description' => 'Durable travel backpack',
                'price' => 39.99,
                'stock' => 120,
                'size' => 'Large',
                'jenis' => 'Bag',
                'image' => 'backpack.jpg',
                'color' => 'Gray',
                'slug' => 'backpack',
                'weight' => 1.5,
            ],
            [
                'name' => 'Tablet',
                'description' => 'Portable touchscreen tablet',
                'price' => 299.99,
                'stock' => 60,
                'size' => '10-inch',
                'jenis' => 'Gadget',
                'image' => 'tablet.jpg',
                'color' => 'Black',
                'slug' => 'tablet',
                'weight' => 0.8,
            ],
        ]);
    }
}
