<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('products')->insert([
                'name' => "Product $i",
                'slug' => Str::slug("Product $i"),
                'description' => "This is a detailed description for Product $i.",
                'short_description' => "Short description of Product $i.",
                'sku' => "SKU00$i",
                'price' => rand(500, 2000),
                'sale_price' => rand(400, 1500),
                'cost_price' => rand(300, 1000),
                'stock_quantity' => rand(10, 100),
                'allow_backorders' => rand(0, 1),
                'is_available' => true,
                'is_featured' => rand(0, 1),
                'is_new' => rand(0, 1),
                'has_variations' => rand(0, 1),
                'weight' => rand(1, 10),
                'height' => rand(10, 50),
                'width' => rand(10, 50),
                'length' => rand(10, 50),
                'category_id' => 1, // Make sure category with ID 1 exists
                'brand_id' => 1, // Optional, make sure it exists
                'supplier_id' => 1, // Optional, make sure it exists
                'view_count' => rand(0, 500),
                'sold_count' => rand(0, 200),
                'specifications' => json_encode([
                    'color' => 'Red',
                    'material' => 'Plastic',
                    'warranty' => '1 Year'
                ]),
                'meta_title' => "Product $i Meta Title",
                'meta_description' => "Meta description for Product $i.",
                'meta_keywords' => "product, demo, item$i",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
