<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $f=$this->faker->firstName,
            'last_name' => $l =$this->faker->lastName,
            'username' => "$f $l",
            'status' => 'active',
            'is_suspended' => $this->faker->boolean(98)
        ];
    }
}
