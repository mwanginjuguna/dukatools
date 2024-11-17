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
            'African', 'Men', 'Women', 'Kid', 'Kitenge', 'Sportswear', 'Casual', 'Official', 'Suit', 'Shirts', 'T-Shirts & Polo shirts', 'Jeans', 'Sweaters', 'Trousers', 'Pants', 'Sweatpants', 'Belts', 'Shorts', 'Coats, Jackets & Vests', 'Jumpsuits, Rompers & Overalls', 'Skirts', 'Handbags & Wallets', 'Dresses', 'Watches', 'Sunglasses & Eyewears', 'Sleep & Lounge', 'Tops & Tees', 'Underwear'
        ],
        'Shoes' => [
            'Sneakers', 'Boots', 'Sandals', 'Flats', 'Loafers', 'Heels', 'Slippers & Slip Ons', 'Sport Shoes', 'Athletic', 'Casual', 'Official', 'Formal', 'Running', 'Swimwear', 'Men Shoes', 'Women Shoes', 'Boy Shoes', 'Girl Shoes', 'Baby Shoes',
        ],
        'Phones' => ['Tablets', 'Smartphones', 'Refurbished', 'Feature Phones', 'Mulika'],
        'Sportswear' => ['Fitness & Exercise', 'Gym Equipment', 'Outdoor Equipment', 'Sports Equipment', 'Sportswear'],
        'Computing' => ['Computers', 'Desktop', 'Playstation', 'PS Games, Controllers & Accessories', 'Laptop', 'Server', 'Gaming Computer', 'Computer Parts', 'Computer Programs', 'Software & Applications'],
        'Electronics' => [
            'Headphones & Earphones', 'Solar', 'Phone Accessories', 'Laptop Accessories', 'Scanners', 'Printers', 'Monitors', 'Computer Accessories', 'Gaming Accessories', 'Networking', 'Data Storage', 'Speakers', 'Lights', 'Camera', 'Lens & Camera Accessories', 'Camera Lights', 'Sound & Music Equipment', 'Home theater & Radio', 'TV', 'Batteries & Battery Packs', 'Cables, Adapters, & Power'
        ],
        'Home & Office' => ['Home Decor & Wall Art', 'Kitchen & Dining', 'Bedding', 'Bathroom', 'Living Room', 'Bedroom', 'School Supplies', 'Office Supplies', 'Children Stationery', 'Storage & Stationery', 'Garden', 'Mats & Carpets'],
        'Food & Supermarket' => ['Meat', 'Vegetables', 'Fish & Seafood', 'Milk & Dairy', 'Bread, Cake & Bakery', 'Confectionery', 'Cooking Supplies', 'Snacks', 'Frozen', 'Drinks', 'Household Supplies', 'Grains & Rice', 'Coffee, Tea & Cocoa'],
        'Automobile' => ['Car Lights', 'Car Security', 'Car Accessories', 'Car Component'],
        'Entertainment' => ['Gaming & Games', 'Music', 'Photography', 'Videography', 'Production', 'Pets', 'Movies'],
        'Groceries' => ['Fruits', 'Vegetables', 'Roots', 'Juice', 'Animal Products', 'Seeds', 'Eggs'],
        'Agriculture' => ['Agro-vet', 'Feeds', 'Produce', 'Farm Tools', 'Seeds & Seedlings', 'Livestock', ''],
        'Logistics' => ['Storage', 'Warehouse', 'Store', 'Warehouse'],
        'Furniture' => ['Office Furniture', 'Home Furniture', 'Kitchen', 'Outdoor Furniture', 'Commercial Furniture', 'Custom Furniture', 'Furniture'],
        'Appliances' => ['Refrigerator', 'Freezers', 'Cookers', 'Blenders', 'Dispensers', 'Washers', 'Dryers', 'Laundry'],
        'Cosmetics & Beauty' => ['Fragrance', 'Luxury', 'Skin care', 'Facial', 'Hair care', 'Makeup', 'Organic', 'Makeup Kits', 'Extensions & Wigs'],
        'Health' => ['Supplements', 'Nutritional', 'Prescription', 'Women Health', 'Men Health', 'Child Health', 'Medical Supplies', 'Pharmacy Supplies'],
        'Other' => ['Industrial', 'Hardware', 'Education', 'Books', 'Other']
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
