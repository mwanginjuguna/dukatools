<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Business;
use App\Models\BusinessDetails;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Discount;
use App\Models\Inventory;
use App\Models\InventoryItem;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductImages;
use App\Models\ProductRating;
use App\Models\ProductReview;
use App\Models\ProductVariation;
use App\Models\ReturnPolicy;
use App\Models\SubCategory;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Arr;

class HardwareVendorSeeder extends Seeder
{
    private array $categories = [
        'Building Materials' => [
            'Cement & Concrete',
            'Bricks & Blocks',
            'Steel & Metal',
            'Timber & Wood',
            'Roofing Materials'
        ],
        'Tools & Equipment' => [
            'Hand Tools',
            'Power Tools',
            'Measuring Tools',
            'Safety Equipment',
            'Garden Tools'
        ],
        'Plumbing' => [
            'Pipes & Fittings',
            'Bathroom Fixtures',
            'Water Heaters',
            'Pumps & Valves',
            'Plumbing Tools'
        ],
        'Electrical' => [
            'Wires & Cables',
            'Switches & Sockets',
            'Lighting',
            'Circuit Protection',
            'Electrical Tools'
        ],
        'Paint & Finishes' => [
            'Interior Paint',
            'Exterior Paint',
            'Primers',
            'Varnishes',
            'Paint Tools'
        ]
    ];

    private array $brands = [
        'Building Materials' => ['Simba Cement', 'Bamburi', 'Mabati Rolling Mills', 'Blue Triangle', 'East African Portland'],
        'Tools & Equipment' => ['Stanley', 'Bosch', 'Makita', 'DeWalt', 'Black & Decker'],
        'Plumbing' => ['Kisumu Pipes', 'Aqua Pipes', 'KShield', 'Watertech', 'Plumbtech'],
        'Electrical' => ['East African Cables', 'Powertech', 'ElectroMax', 'VoltMaster', 'Kenya Power'],
        'Paint & Finishes' => ['Crown Paints', 'Basco Paints', 'Sadolin', 'Duracoat', 'Regal Paints']
    ];

    private array $products = [
        'Building Materials' => [
            'Cement & Concrete' => [
                ['name' => 'Simba Cement 50kg Bag', 'price' => 850.00, 'description' => 'High-quality Portland cement for construction', 'features' => ['50kg bag', '32.5R strength class', 'Suitable for general construction']],
                ['name' => 'Bamburi Cement 50kg Bag', 'price' => 880.00, 'description' => 'Premium cement for structural applications', 'features' => ['50kg bag', '42.5R strength class', 'Fast setting']],
                ['name' => 'Ready Mix Concrete 1m³', 'price' => 12000.00, 'description' => 'Pre-mixed concrete for immediate use', 'features' => ['1 cubic meter', 'Ready to use', 'Consistent quality']],
            ],
            'Bricks & Blocks' => [
                ['name' => 'Standard Red Brick (1000pcs)', 'price' => 25000.00, 'description' => 'Traditional red clay bricks', 'features' => ['1000 pieces per pallet', 'Standard size', 'High durability']],
                ['name' => 'Hollow Block 6" (100pcs)', 'price' => 18000.00, 'description' => 'Concrete hollow blocks for walls', 'features' => ['6 inch thickness', '100 pieces per pallet', 'Lightweight']],
                ['name' => 'Interlocking Blocks (500pcs)', 'price' => 35000.00, 'description' => 'Modern interlocking building blocks', 'features' => ['500 pieces per pallet', 'No mortar needed', 'Quick construction']],
            ],
        ],
        'Tools & Equipment' => [
            'Hand Tools' => [
                ['name' => 'Stanley 16oz Claw Hammer', 'price' => 2500.00, 'description' => 'Professional grade hammer', 'features' => ['16oz weight', 'Fiberglass handle', 'Anti-slip grip']],
                ['name' => 'Bosch 13-Piece Screwdriver Set', 'price' => 3500.00, 'description' => 'Complete screwdriver set', 'features' => ['13 pieces', 'Magnetic tips', 'Ergonomic handles']],
                ['name' => 'Stanley 25ft Tape Measure', 'price' => 1200.00, 'description' => 'Professional measuring tape', 'features' => ['25ft length', 'Auto-lock', 'Durable case']],
            ],
            'Power Tools' => [
                ['name' => 'Makita Cordless Drill Set', 'price' => 25000.00, 'description' => 'Professional cordless drill kit', 'features' => ['18V battery', '2 batteries included', 'Carrying case']],
                ['name' => 'Bosch Angle Grinder 4"', 'price' => 8500.00, 'description' => 'Heavy-duty angle grinder', 'features' => ['4 inch disc', '720W power', 'Safety guard']],
                ['name' => 'DeWalt Circular Saw', 'price' => 15000.00, 'description' => 'Professional circular saw', 'features' => ['7-1/4 inch blade', 'Laser guide', 'Dust blower']],
            ],
        ],
        'Plumbing' => [
            'Pipes & Fittings' => [
                ['name' => 'PVC Pipe 1" (6m)', 'price' => 450.00, 'description' => 'Standard PVC water pipe', 'features' => ['1 inch diameter', '6 meters length', 'Pressure rated']],
                ['name' => 'Copper Pipe 1/2" (3m)', 'price' => 1200.00, 'description' => 'High-quality copper pipe', 'features' => ['1/2 inch diameter', '3 meters length', 'Corrosion resistant']],
                ['name' => 'PVC Elbow Fitting 1"', 'price' => 50.00, 'description' => '90-degree PVC elbow', 'features' => ['1 inch diameter', 'Schedule 40', 'Pressure rated']],
            ],
        ],
        'Electrical' => [
            'Wires & Cables' => [
                ['name' => 'Copper Wire 2.5mm² (100m)', 'price' => 4500.00, 'description' => 'Standard electrical wire', 'features' => ['2.5mm² cross-section', '100 meters', 'PVC insulated']],
                ['name' => 'Extension Cord 30m', 'price' => 2500.00, 'description' => 'Heavy-duty extension cord', 'features' => ['30 meters length', '3-pin plug', 'Weather resistant']],
                ['name' => 'Earthing Cable 16mm² (50m)', 'price' => 8500.00, 'description' => 'Grounding cable', 'features' => ['16mm² cross-section', '50 meters', 'Bare copper']],
            ],
        ],
        'Paint & Finishes' => [
            'Interior Paint' => [
                ['name' => 'Crown Paints Emulsion 20L', 'price' => 8500.00, 'description' => 'Premium interior wall paint', 'features' => ['20 liters', 'Washable', 'Low odor']],
                ['name' => 'Sadolin Silk Finish 4L', 'price' => 3500.00, 'description' => 'Silk finish interior paint', 'features' => ['4 liters', 'Smooth finish', 'Easy to clean']],
                ['name' => 'Duracoat Ceiling Paint 20L', 'price' => 7800.00, 'description' => 'Specialized ceiling paint', 'features' => ['20 liters', 'Anti-mold', 'Stain resistant']],
            ],
        ],
    ];

    public function run(): void
    {
        // Create vendor and user
        $vendor = Vendor::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Kamau',
            'username' => 'kamau_hardware',
        ]);

        $vendorUser = User::factory()->create([
            'name' => 'John Kamau',
            'email' => 'kamau@eldorethardware.co.ke',
            'userable_id' => $vendor->id,
            'userable_type' => Vendor::class,
            'phone_number' => '+254712345678',
            'country' => 'Kenya',
            'password' => Hash::make('johnkamau123'),
        ]);
        $vendorUser->role = 'V';
        $vendorUser->save();

        // Create business
        $business = Business::factory()->create([
            'user_id' => $vendorUser->id,
            'vendor_id' => $vendor->id,
            'name' => 'Eldoret Hardware & Building Supplies'
        ]);

        // Create business details
        BusinessDetails::factory()->create([
            'business_id' => $business->id,
            'legal_name' => 'Eldoret Hardware & Building Supplies Limited',
            'alternate_name' => 'Eldoret Hardware',
            'address' => [
                'streetAddress' => '123 Oloo Street',
                'addressLocality' => 'Eldoret',
                'addressRegion' => 'Uasin Gishu',
                'postalCode' => '30100',
            ],
            'latitude' => 0.5143,
            'longitude' => 35.2698,
            'price_range' => '$$',
            'opening_hours' => [
                'Monday' => '7:00 AM - 6:00 PM',
                'Tuesday' => '7:00 AM - 6:00 PM',
                'Wednesday' => '7:00 AM - 6:00 PM',
                'Thursday' => '7:00 AM - 6:00 PM',
                'Friday' => '7:00 AM - 6:00 PM',
                'Saturday' => '8:00 AM - 4:00 PM',
                'Sunday' => 'Closed',
            ],
            'payment_accepted' => 'Cash, M-Pesa, Credit Cards',
            'aggregate_rating' => 4.7,
            'rating_count' => 245,
            'slogan' => 'Your One-Stop Shop for Quality Building Materials',
            'founding_date' => '2015-01-01',
            'tax_id' => 'TAX-2015-1234',
            'currencies_accepted' => ['KES'],
            'serves_cuisine' => ['Retail'],
            'business_type' => 'Hardware Store',
            'awards' => 'Best Hardware Store 2023 - Eldoret',
            'photos' => [
                'https://placehold.co/800x600?text=Eldoret+Hardware+1',
                'https://placehold.co/800x600?text=Eldoret+Hardware+2',
                'https://placehold.co/800x600?text=Eldoret+Hardware+3',
            ],
            'social_media' => [
                'facebook' => 'https://facebook.com/eldorethardware',
                'twitter' => 'https://twitter.com/eldorethardware',
                'instagram' => 'https://instagram.com/eldorethardware',
            ],
        ]);

        // Create categories and subcategories
        foreach ($this->categories as $categoryName => $subcategories) {
            $category = Category::create([
                'name' => $categoryName,
                'slug' => \Str::slug($categoryName),
            ]);

            foreach ($subcategories as $subcategoryName) {
                SubCategory::create([
                    'name' => $subcategoryName,
                    'slug' => \Str::slug($subcategoryName),
                    'category_id' => $category->id,
                ]);
            }

            // Create brands for this category
            foreach ($this->brands[$categoryName] as $brandName) {
                Brand::create([
                    'name' => $brandName,
                    'slug' => \Str::slug($brandName),
                ]);
            }
        }

        // Create return policy
        $returnPolicy = ReturnPolicy::create([
            'name' => 'Standard Return Policy',
            'description' => 'Items can be returned within 7 days of purchase with original receipt. Items must be in original condition and packaging.',
            'min_order_quantity' => 1,
            'max_days_to_return' => 7,
            'returns_allowed' => true,
        ]);

        // Create inventory
        $inventory = Inventory::create([
            'vendor_id' => $vendor->id,
            'business_id' => $business->id,
            'name' => $business->name . ' Inventory'
        ]);

        $productImages = Storage::disk('public')->files('hardware');
        // Create products
        foreach ($this->products as $categoryName => $subcategories) {
            $category = Category::where('name', $categoryName)->first();

            foreach ($subcategories as $subcategoryName => $products) {
                $subcategory = SubCategory::where('name', $subcategoryName)->first();
                $brand = Brand::whereIn('name', $this->brands[$categoryName])->inRandomOrder()->first();

                foreach ($products as $productData) {
                    $product = Product::create([
                        'name' => $productData['name'],
                        'slug' => \Str::slug($productData['name']),
                        'description' => $productData['description'],
                        'price' => $productData['price'],
                        'stock_quantity' => rand(10, 100),
                        'is_active' => true,
                        'is_new' => rand(0, 1),
                        'category_id' => $category->id,
                        'sub_category_id' => $subcategory->id,
                        'brand_id' => $brand->id,
                        'return_policy_id' => $returnPolicy->id,
                        'vendor_id' => $vendor->id,
                        'business_id' => $business->id,
                        'image' => (string)(Arr::random($productImages) ?? 'products/hardware.png')
                    ]);

                    // Create product features
                    foreach ($productData['features'] as $feature) {
                        ProductFeature::create([
                            'product_id' => $product->id,
                            'title' => $feature,
                        ]);
                    }

                    // Create inventory item
                    InventoryItem::create([
                        'inventory_id' => $inventory->id,
                        'product_id' => $product->id,
                        'quantity' => $product->stock_quantity,
                    ]);

                    // Add some product variations
                    if (str_contains($product->name, 'Paint')) {
                        ProductVariation::create([
                            'product_id' => $product->id,
                            'type' => 'Color',
                            'details' => 'White',
                            'stock_quantity' => $product->stock_quantity,
                        ]);
                        ProductVariation::create([
                            'product_id' => $product->id,
                            'type' => 'Color',
                            'details' => 'Cream',
                            'stock_quantity' => $product->stock_quantity,
                        ]);
                    }

                    // Add some reviews and ratings
                    for ($i = 0; $i < rand(3, 8); $i++) {
                        ProductReview::create([
                            'product_id' => $product->id,
                            'customer_id' => 1, // You might want to create actual customers
                            'review' => $this->getRandomReview(),
                        ]);

                        ProductRating::create([
                            'product_id' => $product->id,
                            'customer_id' => 1,
                            'rating' => rand(4, 5) + (rand(0, 10) / 10),
                        ]);
                    }
                }
            }
        }

        // Create discount
        Discount::create([
            'code' => 'HARDWARE10',
            'rate' => 0.10,
            'expires_after' => 1000,
        ]);
    }

    private function getRandomReview(): string
    {
        $reviews = [
            'Great quality product, exactly what I needed for my construction project.',
            'Fast delivery and the product was in perfect condition.',
            'Excellent customer service and the product meets all expectations.',
            'Good value for money, would definitely recommend.',
            'High-quality materials, perfect for professional use.',
            'The product exceeded my expectations, very durable.',
            'Great addition to my toolkit, very reliable.',
            'Perfect for home improvement projects.',
            'Excellent product, will buy again.',
            'Good quality at a reasonable price.',
        ];

        return $reviews[array_rand($reviews)];
    }
}
