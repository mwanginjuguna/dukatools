<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->realText(60);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->realTextBetween(),
            'content' => $this->faker->paragraphs(6, true),
            'category_id' => Category::factory(),
            'user_id' => 1,
            'is_published' => true,
            'views' => rand(0, 100000)
        ];
    }
}
