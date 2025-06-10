<?php

namespace App\Livewire\Vendor;

use App\Livewire\Forms\BusinessCreateForm;
use App\Livewire\Forms\BusinessEditForm;
use App\Models\Brand;
use App\Models\Business;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Services\BusinessService;
use App\Services\VendorService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Home extends Component
{
    use WithFileUploads;

    public BusinessCreateForm $form;
    public BusinessEditForm $editForm;

    public $businessLogo;

    public string $imagePath = '';

    public mixed $myShop = null;
    public mixed $vendor = null;

    public function businessSave()
    {
        if (isset($this->businessLogo)) {
            $this->imagePath = Storage::disk('public')
                ->putFileAs(
                    $this->form->name,
                    $this->businessLogo,
                    $this->businessLogo->getClientOriginalName()
                );

            $this->form->logo = $this->imagePath;
        }

        $this->form->save();

        $this->form->reset();

        session()->flash();

        $this->redirectRoute('dashboard');
    }

    private function createBusiness()
    {
        $this->dispatch('show-business-create-form');
    }

    public function mount()
    {
        $this->vendor = VendorService::getStaticVendor();
    }

    public function render()
    {
        $businesses = $this->vendor->businesses;

        $this->myShop = $businesses->first();
        session()->flash('success', 'Welcome home!');

        return view('livewire.vendor.home',[
            'brands' => cache()->remember('brands', now()->addDay(), fn () => Brand::query()->get()),
            'categories' => cache()->remember('categories', now()->addDay(), function () {
                return Category::query()->get();
            }),
            'tags' => cache()->remember('tags', now()->addDay(), function () {
                return Tag::query()->get();
            }),
            'SubCategories' => cache()->remember('categories', now()->addDay(), function () {
                return SubCategory::query()->get();
            }),
            'businesses' => $businesses,
            'user' => Auth::user()
        ]);
    }
}
