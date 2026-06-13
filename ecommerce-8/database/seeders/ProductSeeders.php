<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; 
use App\Models\ProductCategory;
use Illuminate\Support\Str;

class ProductSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Casual Wear',
            'Formal Wear',
            'Activewear',
            'Streetwear',
            'Loungewear'
        ];

        foreach ($categories as $index => $categoryName) {
            $category = ProductCategory::firstOrCreate(
                ['name' => $categoryName],
                ['slug' => Str::slug($categoryName)]
            );

            Product::factory()->createQuietly([
                'product_category_id' => $category->id,
                'name' => 'Product ' . ($index + 1) . ' - ' . $categoryName,
            ]);
        }
    }
}