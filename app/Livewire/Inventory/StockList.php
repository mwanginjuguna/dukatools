<?php

namespace App\Livewire\Inventory;

use App\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class StockList extends Component
{
    use WithPagination;
    public int $totalLowStock = 0;
    public int $totalStock = 0;
    public int $totalProducts = 0;

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
    }

    public function render()
    {
        $vendor = session()->get('vendor');
        $products = Product::query()
            ->where('vendor_id', $vendor->id)
            ->with(['orders'])
            ->orderBy('stock_quantity', 'desc')
            ->paginate(10);

        return view('livewire.inventory.stock-list', [
            'products' => $products,
        ]);
    }
}
