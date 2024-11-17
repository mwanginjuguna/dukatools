<?php

namespace App\Livewire\Forms;

use App\Models\Inventory;
use App\Models\InventoryItem;
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

    public mixed $buyingPrice = 1.99;
    public mixed $sellingPrice = 0;
    public string $brand = '';
    public int $brandId = 0;
    public string $returnPolicy = '';
    public int $returnPolicyId = 0;
    public int $stockQuantity = 1;
    public string $category = '';
    public int $categoryId = 0;
    public int $manufacturerId = 0;
    public int $supplierId = 0;
    public int $vendorId = 0;
    public int $businessId = 0;
    public int $branchId = 0;
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
        $this->sellingPrice = $this->price;

        $product = Product::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'category_id' => $this->categoryId,
            'price' => $this->price,
            'brand_id' => $this->brandId,
            'description' => $this->description,
            'stock_quantity' => $this->stockQuantity,
            'shipped_from' => $this->shippedFrom,
            'image' => $this->image,
            'sku' => $this->sku,
            'tax_percent' => $this->tax,
           'shipping_fee' => $this->shippingFee,
            'user_id' => auth()->id(),
            'vendor_id' => $this->vendorId,
        ]);

        $this->saveRelations($product);

        if (strlen($this->supplierSku) > 0) {
            $product->supplier_sku = $this->supplierSku;
        }

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

        // update inventory
        $this->updateInventory($product);
    }

    /**
     * Save product relations.
     */
    private function saveRelations($product): void
    {
        if ($this->businessId > 0) {
            $product->business_id = $this->businessId;
        }
        if ($this->branchId > 0) {
            $product->branch_id = $this->branchId;
        }
        if ($this->subCategoryId > 0) {
            $product->sub_category_id = $this->subCategoryId;
        }
        if ($this->supplierId > 0) {
            $product->supplier_id = $this->supplierId;
        }
        if ($this->manufacturerId > 0) {
            $product->manufacturer_id = $this->manufacturerId;
        }
        if ($this->returnPolicyId > 0) {
            $product->return_policy_id = $this->returnPolicyId;
        }
        $product->save();
    }

    /**
     * Update inventory
     */
    private function updateInventory($product): void
    {
        $inventory = Inventory::query()->where('vendor_id', $this->vendorId)->first();
        if (!$inventory) {
            $inventory = Inventory::create([
                'vendor_id' => $this->vendorId,
            ]);
        }

        InventoryItem::create([
            'product_id' => $product->id,
            'item_name' => $this->name,
            'selling_price' => $this->sellingPrice,
            'buying_price' => $this->buyingPrice ?? 0,
            'quantity' => $this->stockQuantity,
            'vendor_id' => $this->vendorId,
            'inventory_id' => $inventory->id,
            'stocked_at' => $product->created_at
        ]);
    }
}
