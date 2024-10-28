<?php

namespace Database\Factories;

use App\Models\SubscriptionPlan;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'vendor_id' => Vendor::factory(),
            'subscription_plan_id' => SubscriptionPlan::factory(),
            'start_date' => now()->subDays(rand(-31,31)),
            'end_date' => now()->addDays(rand(-31,31)),
            'remaining_subscription_days' => rand(0, 20),
//            'status' => Arr::random(['pending', 'active']),
            'has_trial' => $this->faker->boolean(80),
            'trial_days' => 14,
            'remaining_trial_days' => 0,
            'trial_starts_at' => now()->subDays(rand(-31,31)),
            'trial_ends_at' => now()->addDays(rand(-31,31))
        ];
    }
}
