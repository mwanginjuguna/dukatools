<?php

namespace Database\Factories;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InventoryItem>
 */
class InventoryItemFactory extends Factory
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
            'inventory_id' => Inventory::factory(),
            'vendor_id' => Vendor::factory(),
            'quantity' => $this->faker->randomNumber(5),
            'reorder_level' => $this->faker->randomNumber(5),
            'reorder_quantity' => $this->faker->randomNumber(5),
            'min_stock_level' => $this->faker->randomNumber(5),
        ];
    }
}
