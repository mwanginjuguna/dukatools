<?php

namespace App\Livewire\Forms;

use App\Models\Inventory;
use App\Models\InventoryItem;
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
        $product->price = $this->price;
        $product->description = $this->description;
        $product->stock_quantity = $this->stockQuantity;
        $product->shipped_from = $this->shippedFrom;
        $product->image = $this->image;
        $product->tax_percent = $this->tax;
        $product->shipping_fee = $this->shippingFee;


        $product->save();

        $this->saveRelations($product);
        $this->updateInventory($product);

        return $product;
    }

    private function updateInventory($product)
    {
        $inventoryItem = InventoryItem::query()->firstWhere('product_id', $product->id);
        if ($inventoryItem !== null) {
            $inventoryItem->quantity = $this->stockQuantity;
            $inventoryItem->last_stocked_at = now();
            $inventoryItem->save();
        }
    }


    /**
     * Save product relations.
     */
    private function saveRelations($product): void
    {
        if ($this->brandId > 0) {
            $product->brand_id = $this->brandId;
        }
        if ($this->categoryId > 0) {
            $product->category_id = $this->categoryId;
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

}
