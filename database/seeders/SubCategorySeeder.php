<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    // sample product categories
    private $categories = [
        'Fashion' => [
            'African', 'Men Fashion', 'Women Fashion', 'Baby & Kids Fashion', 'Kitenge',  'Handbags & Wallets', 'Dresses', 'Watches', 'Sunglasses & Eyewears', 'Sleep & Lounge', 'Tops & Tees',
        ],
        'Clothing' => [
            'Casual', 'Official', 'Suit', 'Shirts', 'T-Shirts & Polo shirts', 'Jeans', 'Sweaters', 'Trousers', 'Pants', 'Sweatpants', 'Belts', 'Shorts', 'Coats, Jackets & Vests', 'Jumpsuits, Rompers & Overalls', 'Skirts', 'Underwear', 'Sportswear',
            ],
        'Shoes' => [
            'Sneakers', 'Boots', 'Sandals', 'Flats', 'Loafers', 'Heels', 'Slippers & Slip Ons', 'Sport Shoes', 'Athletic', 'Casual', 'Official', 'Formal', 'Running', 'Swimwear', 'Men Shoes', 'Women Shoes', 'Boy Shoes', 'Girl Shoes', 'Baby Shoes',
        ],
        'Phones' => ['Tablets', 'Smartphones', 'Refurbished', 'Feature Phones', 'Mulika', 'Phones'],
        'Sportswear' => ['Water Bottle', 'Gym Wear, Clothing & Shoes', 'Fitness & Exercise Clothing', 'Gym Equipment', 'Outdoor Equipment', 'Sports Equipment', 'Sportswear & Outdoor Clothing'],
        'Computing' => ['Computers', 'Desktop', 'Playstation', 'PS Games, Controllers & Accessories', 'Laptop', 'Server', 'Gaming Computer', 'Computer Parts', 'Computer Programs', 'Software & Applications'],
        'Electronics' => [
            'Headphones & Earphones', 'Solar', 'Phone Accessories', 'Laptop Accessories', 'Scanners', 'Printers', 'Monitors', 'Computer Accessories', 'Gaming Accessories', 'Networking', 'Data Storage', 'Speakers', 'Lights', 'Camera', 'Lens & Camera Accessories', 'Camera Lights', 'Sound & Music Equipment', 'Home theater & Radio', 'TV', 'Batteries & Battery Packs', 'Cables, Adapters, & Power'
        ],
        'Home & Office' => [
            'Home Decor & Wall Art', 'Kitchen & Dining', 'Bedding', 'Bathroom', 'Living Room', 'Bedroom', 'School Supplies', 'Office Supplies', 'Children Stationery', 'Storage & Stationery', 'Garden', 'Mats & Carpets'
        ],
        'Hardware' => [
            'Hand & Manual Tools', 'Building & Construction Supplies', 'Carpenter & Woodwork Supplies', 'Lighting Supplies', 'Electrical Tools & Supplies', 'Power Tools', 'Measuring Tools', 'Concrete & Masonry Supplies', 'Plumbing Materials', 'Roofing Materials', 'Paint and Painting Tools', 'Safety Gear', 'Outdoor Equipment', 'General Tools'
        ],
        'Food & Supermarket' => [
            'Meat', 'Vegetables', 'Fish & Seafood', 'Milk & Dairy', 'Bread, Cake & Bakery', 'Confectionery', 'Cooking Supplies', 'Snacks', 'Frozen', 'Drinks', 'Household Supplies', 'Grains', 'Coffee, Tea & Cocoa'
        ],
        'Automobile' => ['Car Lights', 'Car Security', 'Car Accessories', 'Car Parts', 'Car Services', 'Motorcycle, Boda & Bike Parts', 'Cycling & Bicycle Parts'],
        'Entertainment' => ['Gaming & Games', 'Music', 'Photography', 'Videography', 'Production', 'Pets', 'Movies'],
        'Groceries' => ['Fruits', 'Vegetables', 'Roots', 'Juice & Drinks', 'Animal Products', 'Seeds & Grains', 'Eggs', 'General Groceries'],
        'Agriculture' => ['Agro-vet Supplies', 'Animal Feeds', 'Farm Produce', 'Farm Tools', 'Animal & Livestock Supplies', 'Farm Supplies', 'Seeds & Seedlings'],
        'Logistics' => ['Warehouse', 'Store & Storage', 'Warehouse Supplies'],
        'Furniture' => ['Office Furniture', 'Home Furniture', 'Kitchen', 'Outdoor Furniture', 'Commercial Furniture', 'Custom Furniture', 'Furniture Supplies'],
        'Appliances' => ['Refrigerator', 'Freezers', 'Cookers', 'Blenders', 'Dispensers', 'Washers', 'Dryers', 'Laundry', 'Kitchen Supplies', 'Home Supplies'],
        'Cosmetics & Beauty' => ['Fragrance', 'Luxury', 'Skin care', 'Facial', 'Hair care', 'Makeup', 'Organic', 'Makeup Kits', 'Extensions & Wigs', 'Beauty Products'],
        'Health' => ['Supplements', 'Nutritional', 'Medicine', 'Prescription', 'Women Health', 'Men Health', 'Child Health', 'Medical Supplies', 'Pharmacy Supplies'],
        'Other' => ['General', 'Industrial', 'Hardware', 'Education', 'Books', 'Other']
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // loop through each category and create category and subcategories
        foreach ($this->categories as $category => $subcategories) {
            $cat = Category::create(['name' => $category]);
            foreach ($subcategories as $subcategory) {
                $cat->subCategories()->create(['name' => $subcategory]);
            }
        }
    }
}
