<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business>
 */
class BusinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'logo' => $this->faker->imageUrl(640, 480, 'business', true),
            'website' => $this->faker->url,
            'description' => $this->faker->paragraph,
            'user_id' => User::factory(),
            'vendor_id' => Vendor::factory(),
            'location_id' => Location::factory(),
        ];
    }
}
