<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\Discount;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductImages;
use App\Models\ProductRating;
use App\Models\ProductReview;
use App\Models\ProductVariation;
use App\Models\Supplier;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    private array $currencies = [
        ['name' => 'USD', 'rate' => 125.50, 'symbol' => '$'],
        ['name' => 'EUR', 'rate' => 132.79, 'symbol' => '€'],
        ['name' => 'GBP', 'rate' => 157.50, 'symbol' => '£'],
        ['name' => 'CNY', 'rate' => 14.60, 'symbol' => '¥']
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // dummy data for local testing
        if (config('app.env') == 'local') {
            \Laravel\Prompts\info('App is in local environment. Seeding database...');
            // admin user
            $admin = User::factory()->for(Admin::factory()->state([
                'first_name' => config('app.admin.first_name'),
                'last_name' => config('app.admin.last_name'),
                'email' => config('app.admin.email'),
            ]), 'userable')->create([
                'name' => config('app.admin.name'),
                'email' => config('app.admin.email'),
                'password' => Hash::make(config('app.admin.password')),
            ])->first();

            $admin->role = 'A';
            $admin->save();

            // random users
            User::factory(3)->create([
                'created_at' => now()->subMonths(rand(0,5))->subHours(rand(24,120))
            ]);

            \Laravel\Prompts\info('Admin and users seeded.');

            \Laravel\Prompts\info('Creating Posts');
            Tag::factory(6)->create();
            Category::factory(6)->has(Post::factory(2, ['user_id' => $admin->id]))->create();
            \Laravel\Prompts\info('Posts seeded');

            // initialize discount
            $discount = Discount::updateOrCreate(
                [
                    'code' => 'NEWCOMER10'
                ],
                [
                    'code' => 'NEWCOMER10',
                    'rate' => 0.10,
                    'expires_after' => 1000,
                ]
            );

            \Laravel\Prompts\info("Discount seeded. \n Seeding suppliers.");

            // seed users who will be used to seed orders
            $users = User::factory(6)
                ->create([
                'created_at' => now()->subYear()->addMonths(rand(1,6))->subHours(rand(34,120))
            ]);
            $suppliers = Supplier::factory(6)->create([
                'created_at' => now()->subYear()->addMonths(rand(1,6))->subHours(rand(34,120))
            ]);
            \Laravel\Prompts\info("Seeding Products.");
            // seed products that will be used to create orders
            $products = Product::factory(9)
                ->has(ProductFeature::factory(1))
                ->has(ProductVariation::factory(2))
                ->create([
                    'supplier_id' => $suppliers->random()->userable_id,
                    'user_id' => $admin->id
                ]);

            \Laravel\Prompts\info("Users & order-products seeded.");

            for ($i__ = 1; $i__ <= 17; $i__++)
            {
                $customer = Customer::factory()->create();
                // order for a random user
                $order = Order::factory()->create([
                    'user_id' => $customer->id,
                    'discount_id' => $discount->id,
                    'created_at' => Arr::random([
                        now()->subMonths(rand(0, 5))->addHours(rand(24,48)),
                        now()->subYears(rand(2,3))->addMonths((rand(1,12)))->addHours(rand(14,72)),
                        now()->subYear()->addMonths(rand(0,10))->subHours(rand(24,144))
                    ])
                ]);

                \Laravel\Prompts\info("Order {$i__} created.");

                // let's generate random order items for this order
                $itemCount = rand(1,3);

                for ($item = 1; $item < $itemCount; $item++)
                {
                    $product = $products->random();

                    // add extra images
                    ProductImages::factory(2)->create([
                        'product_id' => $product->id
                    ]);

                    // review of the product
                    ProductReview::factory()->count(1)->for($product)->create();

                    // rating of the product by an actual user
                    ProductRating::factory()->count(1)->for($product)->create([
                        'user_id' => $order->user_id
                    ]);

                    $q = random_int(1, 2); // quantity

                    // we'll use products price to calculate the subtotal
                    /** @var float $price */
                    $price = $product->price;

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $q,
                        'subtotal' => $price * $q
                    ]);
                }

                $order->total -= (float)number_format((float)$order->subtotal * (float)$discount->rate, 2);
                $order->save();
            }

            \Laravel\Prompts\info("Orders processed.");

            // random contact messages from registered users
            ContactMessage::factory(7)->create();

            \Laravel\Prompts\info("Messages seeded.");

            Product::factory(6)
                ->has(ProductFeature::factory(2))
                ->has(ProductVariation::factory(2))
                ->create([
                    'user_id' => $admin->id
                ]);
        }

        foreach ($this->currencies as $currency) {
            Currency::create($currency);
        }
    }
}
