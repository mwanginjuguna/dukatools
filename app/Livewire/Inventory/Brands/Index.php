<?php

namespace App\Livewire\Inventory\Brands;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public int $perPage = 15;
    public string $search = '';
    public int $brandCount = 0;

    public string $brandName = '';

    public object $selectedBrand;
    public object $selectedBrandProducts;
    public object $vendor;

    public function submitBrand()
    {
        if (isset($this->brandName)) {
            Brand::updateOrCreate([
                'name' => $this->brandName
            ],[
                'name' => $this->brandName
            ]);
        }

        $this->dispatch('brand-created');
        $this->brandName = '';
    }

    public function showBrand(Brand $brand)
    {
        $this->selectedBrand = $brand;
        $this->selectedBrandProducts = Product::query()
            ->where('vendor_id', $this->vendor->id)
            ->where('brand_id', $brand->id)
            ->get(['name', 'stock_quantity']);

        $this->dispatch('open-modal', 'brand-show-modal');
    }

    public function mount()
    {
        $this->vendor = session()->get('vendor');
    }

    public function render()
    {
        $brands = Brand::query()->withCount('products')->orderBy('products_count', 'desc');
        $this->brandCount = $brands->count();

        return view('livewire.inventory.brands.index', [
            'brands' => $brands->paginate($this->perPage)
        ]);
    }
}
