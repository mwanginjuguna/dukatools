<?php

namespace App\Livewire\Vendor;

use App\Livewire\Forms\BusinessEditForm;
use App\Models\Business;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class BusinessSummary extends Component
{
    private mixed $business;
    public mixed $vendor;
    public BusinessEditForm $editForm;

    public function editBusiness($businessId)
    {
        $this->business = Business::with(['location'])->findOrFail($businessId);

        $this->editForm->name = $this->business->name;
        $this->editForm->email = $this->business->email;
        $this->editForm->address = $this->business->address ?? 'N/A';
        $this->editForm->phone = $this->business->phone_number ?? 'N/A';
        $this->editForm->description = $this->business->description;
        $this->editForm->website = $this->business->website ?? 'N/A';
        $this->editForm->country = $this->business->location->country ?? 'Kenya';
        $this->editForm->town = $this->business->location->town ?? 'N/A';
        $this->editForm->zipCode = $this->business->location->code ?? 'N/A';
        $this->editForm->county = $this->business->location->county ?? 'N/A';

        $this->dispatch('open-modal','show-business-edit-form');
    }

    public function saveEdit()
    {
        $this->editForm->vendorId = $this->vendor->id;
        $this->editForm->locationId = $this->business->location->id;
        $this->editForm->save();

        $this->editForm->reset();

        $this->redirectRoute('vendor.home');
    }

    public function mount()
    {
        $this->vendor = Cache::get('vendor');
        $relations = ['products', 'branches', 'location', 'inventories', 'orders'];
        $business = Business::query()->with($relations)->first();
        $this->business = $business;
    }
    public function render()
    {
        $latests = $this->business->orders()->latest()->limit(5)->get();
        return view('livewire.vendor.business-summary', [
            'business' => $this->business,
            'latestOrders' => $latests
        ]);
    }
}

