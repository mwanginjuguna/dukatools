<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\ReturnPolicy;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productImages = Storage::disk('public')->files('products');

        $name = $this->faker->sentence(5);

        // sample product categories
        $productCategories = ['Clothing', 'Phones', 'Electronics', 'Fitness', 'Fashion',
            'Food', 'Computing', 'Energy', 'Cars', 'Entertainment', 'Agriculture'];

        $subCategories = ['Mens', 'Women', 'Children', 'Phones', 'Gaming', 'PC', 'Laptop',
            'Classic', 'Solar', 'Television', 'Headphones', 'Sports', 'Casual', 'Office'];

        // Sample Product brands
        $productBrands = ['Gucci', 'Mamba', 'Afrikana', 'Simba', 'Tesla', 'Sony',
            'Maara', 'Savannah', 'Maasai', 'Safaricom', 'Tesla', 'Meta', 'Alibaba',
            'Amazon', 'Wakanda', 'Lion', 'Puma', 'Toyota', 'Rasta', 'Apple', 'Google',
            'Samsung', 'Huawei', 'Xiaomi', 'Hp'];

        return [
            'name' => $name,
            'slug' => $sl=Str::slug($name),
            'sku' => Str::substr($sl,0, 6),
            'description' => $this->faker->sentences(4, true),
            'category_id' => Category::factory()->state([
                'name' => $n = Arr::random($productCategories),
                'slug' => Str::slug($n)
            ]),
            'subcategory_id' => SubCategoryFactory::factory()->state([
                'name' => $n = Arr::random($subCategories),
                'slug' => Str::slug($n)
            ]),
            'brand_id' => Brand::factory()->state([
                'name' => $x = Arr::random($productBrands),
                'slug' => Str::slug($x)
            ]),
            'price' => $this->faker->randomFloat(2, 250, 3200),
            'stock_quantity' => rand(0, 52),
            'shipped_from' => $this->faker->city(),
            'image' => Arr::random($productImages),
            'views' => rand(0, 150),
            'return_policy_id' => ReturnPolicy::factory(),
            'supplier_id' => Supplier::factory(),
            'manufacturer_id' => Manufacturer::factory()
        ];
    }
}
