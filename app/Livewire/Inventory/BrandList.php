<?php

namespace App\Livewire\Inventory;

use App\Models\Brand;
use Livewire\Component;

class BrandList extends Component
{
    public int $perPage = 10;

    public string $brandName = '';

    public function submitBrand()
    {
        if (isset($this->brandName)) {
            Brand::updateOrCreate([
                'name' => $this->brandName
            ]);
        }

        $this->dispatch('brand-created');
        $this->brandName = '';
    }

    public function render()
    {
        $brands = Brand::query()->withCount('products')->orderBy('products_count', 'desc')->paginate($this->perPage);
        return view('livewire.inventory.brand-list', [
            'brands' => $brands
        ]);
    }
}
