<?php

namespace App\Livewire\Products;

use App\Actions\ProductFilters;
use App\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ProductList extends Component
{
    public Collection|Paginator $products;

    public string $productFilter;

    public string $brandFilter;
    public string $categoryFilter;

    public object $vendor;

    public array $availableFilters = [
        'brand' => 'brand',
        'category' => 'category',
        'purchased' => 'purchased',
        'outOfStock' => 'stock_quantity',
    ];


    public $selectedProduct;
    public int $currentStockQuantity = 0;
    public int $newStockQuantity = 0;

    public function restockModal(Product $product)
    {
        $this->selectedProduct = $product;
        $this->currentStockQuantity = $product->stock_quantity;
        $this->dispatch('open-modal', 'restock-modal');
    }

    public function restock()
    {
        $this->selectedProduct->stock_quantity += $this->newStockQuantity;
        $this->selectedProduct->save();
        $this->dispatch('stock-updated');
        $this->dispatch('close-modal','restock-modal');
        $this->newStockQuantity = 0;
        sleep(1);
        $this->redirectRoute('vendor.inventory');
    }

    public function applyFilter()
    {
        $val = $this->availableFilters[$this->productFilter];

        $vendor = session()->get('vendor');

        $this->products = match ($val) {
            'brand' => (new ProductFilters)->where('vendor_id', $vendor->id)->productsByBrand($this->brandFilter)->get(),
            'category' => (new ProductFilters)->where('vendor_id', $vendor->id)->productsByCategory($this->categoryFilter)->get(),
            'purchased' => (new ProductFilters)->where('vendor_id', $vendor->id)->purchasedProducts()->get(),
            'stock_quantity' => (new ProductFilters)->where('vendor_id', $vendor->id)->outOfStock()->get(),
            default => Product::query()->where('vendor_id', $vendor->id)->latest()->simplePaginate(48),
        };
    }

    public function render()
    {
        return view('livewire.products.product-list');
    }
}
