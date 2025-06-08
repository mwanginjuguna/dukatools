<?php

namespace Database\Factories;

use App\Models\Business;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusinessDetails>
 */
class BusinessDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $address = [
            'streetAddress' => $this->faker->streetAddress(),
            'addressLocality' => $this->faker->city(),
            'addressRegion' => $this->faker->state(),
            'postalCode' => $this->faker->postcode(),
        ];

        $openingHours = [
            'Monday' => '9:00 AM - 5:00 PM',
            'Tuesday' => '9:00 AM - 5:00 PM',
            'Wednesday' => '9:00 AM - 5:00 PM',
            'Thursday' => '9:00 AM - 5:00 PM',
            'Friday' => '9:00 AM - 5:00 PM',
            'Saturday' => '10:00 AM - 4:00 PM',
            'Sunday' => 'Closed',
        ];

        $currencies = ['KES', 'USD', 'EUR', 'GBP'];
        $cuisines = ['African', 'International', 'Fast Food', 'Fine Dining', 'Cafe', 'Bakery'];

        return [
            'business_id' => Business::factory(),
            'legal_name' => $this->faker->company(),
            'alternate_name' => $this->faker->companySuffix(),
            'address' => $address,
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'price_range' => $this->faker->randomElement(['$', '$$', '$$$', '$$$$']),
            'opening_hours' => $openingHours,
            'payment_accepted' => $this->faker->randomElement(['Cash', 'Credit Card', 'Mobile Money', 'All Payment Methods']),
            'aggregate_rating' => $this->faker->randomFloat(1, 3.0, 5.0),
            'rating_count' => $this->faker->numberBetween(10, 1000),
            'slogan' => $this->faker->catchPhrase(),
            'founding_date' => $this->faker->date(),
            'duns' => $this->faker->numerify('########'),
            'tax_id' => $this->faker->numerify('TAX-####-####'),
            'currencies_accepted' => $this->faker->randomElements($currencies, $this->faker->numberBetween(1, 4)),
            'serves_cuisine' => $this->faker->randomElements($cuisines, $this->faker->numberBetween(1, 3)),
            'business_type' => $this->faker->randomElement(['Retail', 'Restaurant', 'Service', 'Manufacturing', 'Technology']),
            'awards' => $this->faker->optional(0.7)->sentence(),
            'photos' => [
                $this->faker->imageUrl(800, 600, 'business'),
                $this->faker->imageUrl(800, 600, 'business'),
                $this->faker->imageUrl(800, 600, 'business'),
            ],
            'social_media' => [
                'facebook' => $this->faker->url(),
                'twitter' => $this->faker->url(),
                'instagram' => $this->faker->url(),
                'linkedin' => $this->faker->url(),
            ],
        ];
    }
}
