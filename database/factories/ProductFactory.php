<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
        $name = fake()->unique()->name();
        $slug = Str::slug($name);

        $description = fake()->unique()->text();

        $subCategories = [4, 10, 11];
        $subCatRandKey = array_rand($subCategories);

        $brands = [2, 4, 5];
        $brandRandKey = array_rand($brands);


        return [
            'brand_id' => $brands[$brandRandKey],
            'category_id' => 50,
            'sub_category_id' => $subCategories[$subCatRandKey],
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
            'price' => rand(100, 1000),
            'is_featured' => 'Yes',
            'sku' => rand(1000, 3000),
            'track_quantity' => 'Yes',
            'quantity' => 13,
            'status' => 1,
        ];
    }
}
