<?php

namespace App\Livewire\Vendor;

use App\Livewire\Forms\BusinessCreateForm;
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

    public $businessLogo;

    public string $imagePath = '';

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

        $this->redirectRoute('vendor.home');
    }

    private function createBusiness()
    {
        $this->dispatch('show-business-create-form');
    }

    public function mount()
    {
        $this->vendor = Business::query()->where('user_id', Auth::id())->first();
    }

    public function render()
    {
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
