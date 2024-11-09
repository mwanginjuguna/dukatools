<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    // sample product categories
    private $categories = [
        'Fashion' => ['African', 'Men', 'Women', 'Kid', 'Kitenge', 'Sport', 'Casual', 'Official', 'Suit'],
        'Phones' => ['Smartphones', 'Refurbished', 'Feature Phones', 'Mulika'],
        'Sports' => ['Fitness', 'Gym', 'Outdoor', 'Equipment'],
        'Computing' => ['Computers', 'Desktop', 'Laptop', 'Server', 'Gaming'],
        'Electronics' => ['Headphones', 'Solar', 'Phone Accessories', 'Laptop Accessories', 'Scanners', 'Printers', 'Monitors', 'Computer Accessories', 'Networking', 'Data Storage', 'Speakers', 'Lights', 'Camera', 'Sound', 'Home theater', 'Radio', 'TV'],
        'Automobile' => ['Car Lights', 'Car Security', 'Car Accessories', 'Car Component'],
        'Entertainment' => ['Gaming', 'Music', 'Photography', 'Videography', 'Production', 'Pets', 'Movies'],
        'Groceries' => ['Fruits', 'Vegetables', 'Roots', 'Juice', 'Animal Products', 'Seeds', 'Eggs'],
        'Agriculture' => ['Agro-vet', 'Feeds', 'Produce', 'Farm Tools', 'Seeds & Seedlings'],
        'Logistics' => ['Storage', 'Warehouse', 'Store'],
        'Furniture' => ['Office', 'Home', 'Kitchen', 'Outdoor', 'Commercial', 'Custom Furniture'],
        'Appliances' => ['Refrigerator', 'Freezers', 'Cookers', 'Blenders', 'Dispensers', 'Washers', 'Dryers', 'Laundry'],
        'Beauty' => ['Fragrance', 'Luxury', 'Skin care', 'Facial', 'Hair care', 'Makeup', 'Organic'],
        'Health' => ['Supplements', 'Nutritional', 'Prescription', 'Female Health', 'Male Health', 'Child Health'],
        'Other' => ['other']
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
