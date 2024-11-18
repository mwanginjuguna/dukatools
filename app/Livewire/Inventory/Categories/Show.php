<?php

namespace App\Livewire\Inventory\Categories;

use App\Models\Category;
use Livewire\Component;

class Show extends Component
{
    public Category $category;

    public function render()
    {
        return view('livewire.inventory.categories.show', [
            'products' => $this->category->products()
        ]);
    }
}
