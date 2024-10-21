<?php

namespace App\Livewire\Sales\PointOfSale;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductSearch extends Component
{
    use WithPagination;

    public string $searchTerm = '';

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->searchTerm . '%')
            ->paginate(15); // Adjust pagination as needed
        return view('livewire.sales.point-of-sale.product-search', [
            'products' => $products,
        ]);
    }
}
