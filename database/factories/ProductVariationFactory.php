<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'type' => $this->faker->randomElement(['Color', 'Size', 'Material', 'Dimensions']),
            'details' => $this->faker->word(),
            'price_change_percentage' => $this->faker->randomFloat(2, -10, 10),
            'stock_quantity' => $this->faker->numberBetween(0, 100),
        ];
    }
}
