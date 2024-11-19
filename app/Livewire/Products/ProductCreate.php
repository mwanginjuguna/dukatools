<?php

namespace App\Livewire\Products;

use App\Livewire\Forms\ProductCreateForm;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\ProductFeature;
use App\Models\ProductImages;
use App\Models\ProductVariation;
use App\Models\ReturnPolicy;
use App\Models\SubCategory;
use App\Models\Supplier;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductCreate extends Component
{
    use WithFileUploads;

    public ProductCreateForm $form;

    public $productImage;
    public $vendor;
    public $business;

    public string $imagePath = '';

    public function productSave()
    {
        $this->form->vendorId = $this->vendor->id;
        $this->form->businessId = $this->business->id;
        $this->form->locationId = $this->business->location_id ?? 0;

        if (isset($this->productImage)) {
            $this->imagePath = Storage::disk('public')
                ->putFileAs(
                    'products/vendors/'.$this->vendor->reference,
                    $this->productImage,
                    $this->productImage->getClientOriginalName()
                );

            $this->form->image = $this->imagePath;
        }

        $this->form->store();

        $this->form->reset();

        $this->redirectRoute('vendor.index');
    }

    public function mount()
    {
        $this->vendor = session()->get('vendor');
        $this->business = $this->vendor->businesses()->first();
    }

    public function render()
    {
        return view('livewire.products.product-create', [
            'brands' => Brand::query()->get(),
            'categories' => Category::query()->get(),
            'tags' => Tag::query()->get(),
            'SubCategories' => SubCategory::query()->get(),
            'returnPolicies' => ReturnPolicy::query()->get(),
            'suppliers' => Supplier::query()->where('business_id', $this->business->id)->get(),
            'manufacturers' => Manufacturer::query()->where('business_id', $this->business->id)->get()
        ]);
    }
}
