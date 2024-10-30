<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariation>
 */
class ProductVariationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'type' => $this->faker->randomElement(['color', 'size']),//, 'Material', 'Dimensions'
            'details' => function (array $attributes) {
                    return $attributes['type'] === 'size' ? rand(38,45) : Arr::random(['black', 'red', 'white', 'brown']);
                },
            'price_change_percentage' => 0,//$this->faker->randomFloat(2, -10, 10),
            'stock_quantity' => $this->faker->numberBetween(0, 100),
        ];
    }
}
