<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        // Get a random category ID from the categories table
        $categoryIds = Category::pluck('id')->toArray();
        $categoryId = $this->faker->randomElement($categoryIds);

        return [
            'sku' => $this->faker->unique()->bothify('??-########'),
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->text(20),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'stock' => $this->faker->numberBetween(1, 1000),
            'category_id' => $categoryId,
        ];
    }
}
