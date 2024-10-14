<?php

namespace App\Livewire\Inventory;

use App\Models\Product;
use Livewire\Component;

class StockOutList extends Component
{
    public function render()
    {
        $products = Product::query()
            ->with(['orders'])
            ->where('stock_quantity', 0)
            ->paginate(10);

        return view('livewire.inventory.stock-out-list', [
            'products' => $products
        ]);
    }
}
