<?php

namespace App\Livewire\Inventory\Categories;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class Index extends Component
{
    public int $perPage = 5;
    public int $categoriesCount = 0;
    public int $subCategoriesCount = 0;

    public string $categoryName = '';
    public string $subCategoryName = '';

    public function submitCategory()
    {
        if(isset($this->categoryName)) {
            Category::updateOrCreate(['name' => $this->categoryName],['name' => $this->categoryName]);

            $this->dispatch('category-created');
            
            $this->categoryName = '';
        }
    }

    public function submitSubCategory()
    {
        if(isset($this->subCategoryName)) {
            SubCategory::updateOrCreate(['name' => $this->subCategoryName],['name' => $this->subCategoryName]);

            $this->dispatch('sub-category-created');

            $this->subCategoryName = '';
        }
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::query()
            ->orderBy('products_count', 'desc');
        $subCategories = SubCategory::query()
            ->orderBy('products_count', 'desc');

        $this->categoriesCount = $categories->count();
        $this->subCategoriesCount = $subCategories->count();

        return view('livewire.inventory.categories.index', [
            'categories' => $categories->paginate($this->perPage),
            'subCategories' => $subCategories->paginate($this->perPage)
        ]);
    }
}
