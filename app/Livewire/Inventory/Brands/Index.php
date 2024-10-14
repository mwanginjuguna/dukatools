<?php

namespace App\Livewire\Inventory\Brands;

use App\Models\Brand;
use Livewire\Component;

class Index extends Component
{
    public int $perPage = 5;
    public string $search = '';
    public int $brandCount = 0;

    public string $brandName = '';

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

    public function render()
    {
        $brands = Brand::query()->orderBy('products_count');
        $this->brandCount = $brands->count();

        return view('livewire.inventory.brands.index', [
            'brands' => $brands->paginate($this->perPage)
        ]);
    }
}
