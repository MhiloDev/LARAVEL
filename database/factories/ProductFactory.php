<?php

namespace Database\Factories;
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
    public function definition()
    {
        return [
            'name' => fake()->sentence(3),
            'description' => fake()->realText(150),
            'price' => fake()->randomFloat(2,8,99),
            'category_id' => fake()->numberBetween(1,5)
        ];
    }
}
