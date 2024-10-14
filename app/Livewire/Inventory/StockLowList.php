<?php

namespace App\Livewire\Inventory;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class StockLowList extends Component
{
    use WithPagination;

    public int $lowestStock = 5;

    public function render()
    {
        $products = Product::query()
            ->with(['orders'])
            ->where('stock_quantity', '<', $this->lowestStock)
            ->paginate(10);

        return view('livewire.inventory.stock-low-list', [
            'products' => $products
        ]);
    }
}
