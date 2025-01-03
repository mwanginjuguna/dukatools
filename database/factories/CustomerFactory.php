<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'location_id' => Location::factory(),
            'vendor_id' => Vendor::factory(),
            'email' => $this->faker->email,
            'phone_number' => $this->faker->phoneNumber,
            'source' => Arr::random(['direct', 'facebook', 'instagram', 'website'])
        ];
    }
}
