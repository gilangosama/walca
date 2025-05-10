<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            [
                'name' => 'Men\'s Clothing',
                'slug' => Str::slug('Men\'s Clothing'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Women\'s Clothing',
                'slug' => Str::slug('Women\'s Clothing'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kids\' Clothing',
                'slug' => Str::slug('Kids\' Clothing'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Accessories',
                'slug' => Str::slug('Accessories'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Footwear',
                'slug' => Str::slug('Footwear'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
