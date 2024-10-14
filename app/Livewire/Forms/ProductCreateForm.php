<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductCreateForm extends Form
{
    #[Validate('required')]
    public string $name = '';

    #[Validate('required')]
    public mixed $price = 1.99;

    #[Validate('required')]
    public string $description = '';

    public string $brand = '';
    public int $brandId = 0;
    public string $returnPolicy = '';
    public int $returnPolicyId = 0;
    public int $stockQuantity = 1;
    public string $category = '';
    public int $categoryId = 0;
    public int $manufacturerId = 0;
    public int $supplierId = 0;
    public int $subCategoryId = 0;
    public mixed $tax = 0;
    public string $shippedFrom = '';
    public string $sku = '';
    public string $supplierSku = '';
    public mixed $shippingFee = 0;

    public string $image = '';
    public string $color = '';
    public string $size = '';
    public string $dimension = '';
    public string $gender = '';

    public function store()
    {
        $this->validate();

        $product = Product::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'category_id' => $this->categoryId,
            'sub_category_id' => $this->subCategoryId,
            'price' => $this->price,
            'brand_id' => $this->brandId,
            'description' => $this->description,
            'stock_quantity' => $this->stockQuantity,
            'return_policy_id' => $this->returnPolicyId,
            'shipped_from' => $this->shippedFrom,
            'image' => $this->image,
            'sku' => $this->sku,
            'supplier_sku' => $this->supplierSku,
            'supplier_id' => $this->supplierId,
            'manufacturer_id' => $this->manufacturerId,
            'tax_percent' => $this->tax,
           'shipping_fee' => $this->shippingFee,
        ]);

        $listOfVariants = [];
        $listOfVariants[] = isset($this->color) ?  ['type'=>'color', 'details'=>$this->color]: [];
        $listOfVariants[] = isset($this->size) ?  ['type'=>'size', 'details'=> $this->size]: [];
        $listOfVariants[] = isset($this->dimension) ?  ['type'=>'dimension', 'details'=> $this->dimension]: [];
        $listOfVariants[] = isset($this->gender) ?  ['type'=>'gender', 'details'=> $this->gender]: [];

        foreach ($listOfVariants as $variant) {
            ProductVariation::create([
                'product_id' => $product->id,
                'type' => Arr::get($variant, 'type'),
                'details' => Arr::get($variant, 'details'),
                'price_change_percentage' => 0,
               'stock_quantity' => $this->stockQuantity,
            ]);
        }
    }
}
