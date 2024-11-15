<?php

namespace App\Livewire\Inventory;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class StockLowList extends Component
{
    use WithPagination;

    public int $lowestStock = 10;

    public function render()
    {
        $vendor = session()->get('vendor');

        $products = Product::query()
            ->where('vendor_id', $vendor->id)
            ->with(['orders'])
            ->where('stock_quantity', '<', $this->lowestStock)
            ->orderBy('stock_quantity', 'asc')
            ->paginate(10);

        return view('livewire.inventory.stock-low-list', [
            'products' => $products
        ]);
    }
}
