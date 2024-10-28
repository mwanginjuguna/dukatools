<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Customer;
use App\Models\ShippingAddress;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_name' => $this->faker->name,
            'customer_email' => $this->faker->email,
            'customer_phone' => $this->faker->phoneNumber(),
            'subtotal' => $this->faker->randomFloat(2, min: 1000, max: 25000),
            'total' => $this->faker->randomFloat(2, min: 1000, max: 25000),
            'shipping_fee' => $this->faker->randomFloat(2, 50, 150),
            'tax' => $this->faker->randomFloat(2, 35, 85),
            'is_paid' => $this->faker->boolean(80),
            'status' => function (array $attributes) {
                return $attributes['is_paid'] ? Arr::random(['paid', 'delivered']) : 'pending';
            },
            'payment_method' => function (array $attributes) {
                return $attributes['is_paid'] ? Arr::random(['card', 'mpesa', 'cash']) : '';
            },
            'tracking_number' => function (array $attributes) {
                return $attributes['is_paid'] ? Str::random(10) : null;
            },
            'customer_id' => Customer::factory(),
            'user_id' => User::factory(),
            'shipping_address_id' => ShippingAddress::factory(),
            'branch_id' => Branch::factory(),
            'vendor_id' => Vendor::factory()
        ];
    }

}
