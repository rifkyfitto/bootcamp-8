<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory; // <-- Tambahkan import ini
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->sentence(3);

        return [
            'product_category_id' => ProductCategory::factory(), // Ini akan mencari ProductCategoryFactory
            'name' => ucfirst($name),
            'slug' => Str::slug($name).'-'.Str::random(5),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(10000, 100000),
            'stock' => $this->faker->numberBetween(0, 100),
            'image' => 'products/default.png',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}