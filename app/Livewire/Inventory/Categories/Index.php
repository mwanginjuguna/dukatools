<?php

namespace App\Livewire\Inventory\Categories;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public int $perPage = 15;
    public int $categoriesCount = 0;
    public int $subCategoriesCount = 0;

    public string $categoryName = '';
    public string $subCategoryName = '';
    public string $categorySearch = '';
    public string $subCategorySearch = '';

    public object $selectedCategory;
    public object $selectedSubcategory;

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


    public function showCategory(Category $category)
    {
        $this->selectedCategory = $category;

        $this->dispatch('open-modal', 'show-category-modal');
    }

    public function showSubcategory(SubCategory $subcategory)
    {
        $this->selectedSubcategory = $subcategory;

        $this->dispatch('open-modal', 'show-subcategory-modal');
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categoryQuery = Category::query();
        $subCategoryQuery = SubCategory::query();

        if ($this->categorySearch !== '') {
            $categoryQuery->where('name', 'like', '%'. $this->categorySearch. '%');
        }
        if ($this->subCategorySearch!== '') {
            $subCategoryQuery->where('name', 'like', '%'. $this->subCategorySearch. '%');
        }

        $subCategoryQuery->withCount('products');
        $categoryQuery->withCount('products');

        $this->categoriesCount = $categoryQuery->count();
        $this->subCategoriesCount = $subCategoryQuery->count();

        return view('livewire.inventory.categories.index', [
            'categories' => $categoryQuery->paginate($this->perPage),
            'subCategories' => $subCategoryQuery->orderBy('products_count', 'desc')->paginate($this->perPage)
        ]);
    }
}
