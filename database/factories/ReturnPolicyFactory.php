<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReturnPolicy>
 */
class ReturnPolicyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => Arr::random(['30 days', '3 days', '7 days', '14 days']),
            'description' => $this->faker->text(255),
            'min_order_quantity' => rand(1, 10),
            'max_days_to_return' => rand(3, 30),
        ];
    }
}
