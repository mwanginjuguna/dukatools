<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    private $productBrands = [
        'General', 'Apple',  'Gameplan', 'Sony', 'Oppo', 'Infinix', 'Tecno', 'Safaricom', 'Samsung', 'Huawei', 'Xiaomi', 'Hp', 'Other'];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->productBrands as $productBrand) {
            Brand::create(['name' => $productBrand]);
        }
    }
}
