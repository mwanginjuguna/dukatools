<?php

namespace Database\Factories;

use App\Models\Business;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
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
            'email' => $this->faker->email,
            'phone_number' => $this->faker->phoneNumber,
            'role' => Arr::random(['sales', 'cashier', 'manager', 'supervisor']),
            'status' => Arr::random(['active', 'inactive', 'suspended', 'on-leave']),
            'location_id' => Location::factory(),
            'business_id' => Business::factory(),
        ];
    }
}
