<?php

namespace App\Livewire\Inventory;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;

    public int $perPage = 5;

    public function render()
    {
        $categories = Category::query()->orderBy('products_count', 'desc')->paginate($this->perPage);
        $subCategories = SubCategory::query()->orderBy('products_count', 'desc')->paginate($this->perPage);

        return view('livewire.inventory.category-list', [
            'categories' => $categories,
            'subCategories' => $subCategories
        ]);
    }
}
