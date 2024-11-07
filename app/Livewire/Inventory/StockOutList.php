<?php

namespace App\Livewire\Inventory;

use App\Models\Product;
use Livewire\Component;

class StockOutList extends Component
{
    public function render()
    {
        $vendor = session()->get('vendor');

        $products = Product::query()
            ->where('vendor_id', $vendor->id)
            ->with(['orders'])
            ->where('stock_quantity', 0)
            ->paginate(10);

        return view('livewire.inventory.stock-out-list', [
            'products' => $products
        ]);
    }
}
