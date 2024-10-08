<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShippingAddress>
 */
class ShippingAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'street_address' => $this->faker->streetAddress,
            'apartment_suite' => $this->faker->optional()->word,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zip_code' => $this->faker->postcode,
            'country' => $this->faker->country,
            'phone_number' => $this->faker->optional()->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'shipping_fee' => $this->faker->optional()->randomFloat(2, 5, 100),
            'location_id' => Location::factory(),
        ];
    }
}
