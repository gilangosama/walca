<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    ProductCategory::insert([
      ['product_id' => 1, 'category_id' => 1], // Smartphone -> Electronics
      ['product_id' => 2, 'category_id' => 2], // T-Shirt -> Fashion
      ['product_id' => 3, 'category_id' => 1], // Laptop -> Electronics
      ['product_id' => 4, 'category_id' => 4], // Headphones -> Accessories
      ['product_id' => 5, 'category_id' => 3], // Refrigerator -> Home Appliances
      ['product_id' => 6, 'category_id' => 3], // Microwave -> Home Appliances
      ['product_id' => 7, 'category_id' => 5], // Sneakers -> Footwear
      ['product_id' => 8, 'category_id' => 4], // Watch -> Accessories
      ['product_id' => 9, 'category_id' => 4], // Backpack -> Accessories
      ['product_id' => 10, 'category_id' => 1], // Tablet -> Electronics
    ]);
  }
}
