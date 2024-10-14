<?php

namespace App\Livewire\Products;

use App\Actions\ProductFilters;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class ListTable extends Component
{
    use WithPagination;

    public int $productCount = 0;
    public float $productSales = 0;
    public mixed $selectedFilter = null;
    public mixed $sortOrder = 'desc';

    public function applyFilter()
    {
        $this->resetPage();
    }

    public function sortByPrice()
    {
        $this->selectedFilter = 'price';
        $this->resetPage();
    }

    public function sortByName()
    {
        $this->selectedFilter = 'price';
        $this->resetPage();
    }

    public function sortByStock()
    {
        $this->selectedFilter = 'sort-by-stock';
        $this->resetPage();
    }

    public function mount() {
        $pQuery = Product::query();
        $this->productCount = $pQuery->count();
        $this->productSales = $pQuery->sum('price');
    }

    public function render()
    {
        $productQuery = Product::query()->latest();
        if ($this->selectedFilter) {
            switch ($this->selectedFilter) {
                case 'stock_quantity':
                    $productQuery = (new ProductFilters)->outOfStock();
                    break;
                case 'sort-by-stock':
                    $productQuery = Product::query()->orderBy('stock_quantity', 'asc');
                    break;
                case 'price':
                    $productQuery->orderBy('price', 'desc');
                    break;
                case 'name':
                    $productQuery->orderBy('name');
                    break;
                default:
                    $productQuery = Product::query()->latest();
                    break;
            }
        }
        return view('livewire.products.list-table', [
            'products' => $productQuery->paginate(10)
        ]);
    }
}
