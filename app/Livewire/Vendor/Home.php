<?php

namespace App\Livewire\Vendor;

use App\Livewire\Forms\BusinessCreateForm;
use App\Livewire\Forms\BusinessEditForm;
use App\Models\Brand;
use App\Models\Business;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Tag;
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

        $this->redirectRoute('dashboard');
    }

    private function createBusiness()
    {
        $this->dispatch('show-business-create-form');
    }

    public function editBusiness($businessId)
    {
        $this->editForm->name = $this->myShop->name;
        $this->editForm->email = $this->myShop->email;
        $this->editForm->address = $this->myShop->address ?? 'N/A';
        $this->editForm->phone = $this->myShop->phone_number ?? 'N/A';
        $this->editForm->description = $this->myShop->description;
        $this->editForm->website = $this->myShop->website ?? 'N/A';
        $this->editForm->country = $this->myShop->location->country ?? 'Kenya';
        $this->editForm->town = $this->myShop->location->town ?? 'N/A';
        $this->editForm->zipCode = $this->myShop->location->code ?? 'N/A';
        $this->editForm->county = $this->myShop->location->county ?? 'N/A';

        $this->dispatch('open-modal','show-business-edit-form');
    }

    public function saveEdit()
    {
        $this->editForm->vendorId = $this->vendor->id;
        $this->editForm->locationId = $this->myShop->location->id;
        $this->editForm->save();

        $this->editForm->reset();

        $this->redirectRoute('vendor.home');
    }

    public function mount()
    {
        $this->myShop = Business::query()->where('user_id', Auth::id())->first();
        $this->vendor = session()->get('vendor');
    }

    public function render()
    {
//        $user = Auth::user();
//        dd($user);
        $businessQuery = Business::query()->where('user_id', Auth::id());
        $businessQuery->latest()->get();
        return view('livewire.vendor.home',[
            'brands' => Brand::query()->get(),
            'categories' => Category::query()->get(),
            'tags' => Tag::query()->get(),
            'SubCategories' => SubCategory::query()->get(),
            'businesses' => $businessQuery
        ]);
    }
}
