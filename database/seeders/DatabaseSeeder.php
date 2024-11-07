<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Branch;
use App\Models\Business;
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
use App\Models\Vendor;
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
            \Laravel\Prompts\info('Seeding admin.');
            // admin user
            $admin = Admin::factory()->create([
                'first_name' => config('app.admin.first_name'),
                'last_name' => config('app.admin.last_name'),
                'email' => config('app.admin.email'),
                'phone_number' => config('app.admin.phone_number'),
            ]);
            $adminUser = User::factory()->create([
                'name' => config('app.admin.name'),
                'email' => config('app.admin.email'),
                'userable_id' => $admin->id,
                'userable_type' => Admin::class,
                'phone_number' => config('app.admin.phone_number'),
                'password' => Hash::make(config('app.admin.password')),
            ]);

            $adminUser->role = 'A';
            $adminUser->save();

            // seed a vendor
            \Laravel\Prompts\info('Seeding vendor...');
            $vendor = Vendor::factory()->create([
                'first_name' => config('app.vendor.first_name'),
                'last_name' => config('app.vendor.last_name'),
                'username' => config('app.vendor.username'),
            ]);
            $vendorUser = User::factory()->create([
                'name' => config('app.vendor.username'),
                'email' => config('app.vendor.email'),
                'userable_id' => $vendor->id,
                'userable_type' => Vendor::class,
                'phone_number' => config('app.vendor.phone_number'),
                'country' => config('app.vendor.country'),
                'password' => Hash::make(config('app.vendor.password')),
            ]);

            $vendorUser->role = 'V';
            $vendorUser->save();

            \Laravel\Prompts\info('Admin and vendor seeded.');

            \Laravel\Prompts\info('Creating Posts');
            $postTags = ['Marketing', 'Sales', 'Inventory', 'Shopping', 'Docs', 'Tips'];
            $categories = ['Technology', 'Lifestyle', 'Sports', 'Food', 'Travel', 'Business', 'Health'];

            Arr::map($postTags, fn($tag) => Tag::factory(6)->create([
                'name' => $tag
            ]));

            // seed categories with goods
            Arr::map($categories, fn($category) => Category::factory(6)
                ->has(Post::factory(2, ['user_id' => $admin->id]))
                ->create([
                    'name' => $category
                ])
            );

            \Laravel\Prompts\info('Posts seeded');

            // initialize discount
            $discount = Discount::updateOrCreate(
                [
                    'code' => 'DUKANI10'
                ],
                [
                    'code' => 'DUKANI10',
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
            \Laravel\Prompts\info("Seeding a business.");
            // seed A business
            $business = Business::factory()->create([
                'user_id' => $vendorUser->id,
                'vendor_id' => $vendor->id,
                'name' => 'Top-G Shoes'
            ]);

            $branch = Branch::factory()->create([
                'business_id' => $business->id,
                'location_id' => $business->location_id,
                'name' => 'Eldoret CBD'
            ]);

            \Laravel\Prompts\info("Seeding Products.");
            // seed products that will be used to create orders
            $products = Product::factory(21)
                ->has(ProductFeature::factory(1))
                ->has(ProductVariation::factory(2))
                ->create([
                    'supplier_id' => $suppliers->random()->userable_id,
                    'user_id' => $vendorUser->id,
                    'vendor_id' => $vendor->id,
                    'business_id' => $business->id,
                    'branch_id' => $branch->id
                ]);

            \Laravel\Prompts\info("Users & order-products seeded.");

            for ($i__ = 1; $i__ <= 27; $i__++)
            {
                $customer = Customer::factory()->create([
                    'vendor_id' => $vendor->id
                ]);
                // order for a random user
                $randomDate = Arr::random([
                    now()->subHour(),
                    now()->subDays(rand(0,5)),
                    now()->subWeeks(rand(1,5)),
                    now()->subMonths(rand(1, 5))->addHours(rand(24, 48)),
                    now()->subYears(rand(1, 3))->addMonths((rand(1, 12)))->addHours(rand(14, 72)),
                    now()->subYear()->addMonths(rand(0, 10))->subHours(rand(24, 144))
                ]);
                $order = Order::factory()->create([
                    'customer_id' => $customer->id,
                    'vendor_id' => $vendor->id,
                    'branch_id' => $branch->id,
                    'discount_id' => $discount->id,
                    'paid_at' => $randomDate,
                    'created_at' => $randomDate,
                ]);

                \Laravel\Prompts\info("Order {$i__} created.");

                // let's generate random order items for this order
                $itemCount = rand(1,3);

                $orderTotal = 0.0;
                for ($item = 1; $item < $itemCount; $item++)
                {
                    $product = $products->random();

                    // add extra images
                    ProductImages::factory(2)->create([
                        'product_id' => $product->id
                    ]);

                    // review of the product
                    ProductReview::factory()->count(1)->for($product)->create([
                        'customer_id' => $order->customer_id
                    ]);

                    // rating of the product by an actual user
                    ProductRating::factory()->count(1)->for($product)->create([
                        'customer_id' => $order->customer_id
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

                    $orderTotal += $price * $q;
                }
                $order->subtotal = $orderTotal;
                $order->total = $orderTotal + $order->tax ?? 0.0 + $order->shipping_fee ?? 0.0;

                $order->total -= (float)number_format((float)$order->total * (float)$discount->rate, 2);
                $order->save();
            }

            \Laravel\Prompts\info("Orders processed.");

            // random contact messages from registered users
            ContactMessage::factory(13)->create();

            \Laravel\Prompts\info("Messages seeded.");

//            Product::factory(6)
//                ->has(ProductFeature::factory(2))
//                ->has(ProductVariation::factory(2))
//                ->create([
//                    'user_id' => $vendorUser->id,
//                    'vendor_id' => $vendor->id,
//                    'branch_id' => $branch->id,
//                ]);
        }

        foreach ($this->currencies as $currency) {
            Currency::create($currency);
        }
    }
}
