<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductEditForm extends Form
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

    public function update(object $product): object
    {
        $this->validate();

        $product->name = $this->name;
        $product->slug = Str::slug($this->name);
        $product->category_id = $this->categoryId;
        $product->price = $this->price;
        $product->brand_id = $this->brandId;
        $product->description = $this->description;
        $product->stock_quantity = $this->stockQuantity;
        $product->return_policy_id = $this->returnPolicyId;
        $product->shipped_from = $this->shippedFrom;
        $product->image = $this->image;
        $product->manufacturer_id = $this->manufacturerId;
        $product->supplier_id = $this->supplierId;
        $product->sub_category_id = $this->subCategoryId;
        $product->tax_percent = $this->tax;
        $product->shipping_fee = $this->shippingFee;

        $product->save();

        return $product;
    }
}
