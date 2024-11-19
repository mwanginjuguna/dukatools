<?php

namespace Database\Factories;

use App\Models\Business;
use App\Models\Location;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->domainName,
            'vendor_id' => Vendor::factory(),
            'business_id' => Business::factory(),
            'location_id' => Location::factory()
        ];
    }
}
