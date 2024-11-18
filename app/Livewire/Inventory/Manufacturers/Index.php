<?php

namespace App\Livewire\Inventory\Manufacturers;

use App\Livewire\Forms\ManufacturerCreateForm;
use App\Models\Manufacturer;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public ManufacturerCreateForm $form;
    public int $manufacturerCount = 0;
    public int $perPage = 15;
    // search
    public string $search = '';

    public bool $isView = false;
    public object $selectedManufacturer;

    public object $vendor;
    public object $business;

    public function saveManufacturer()
    {
        $this->form->businessId = $this->business->id;
        $this->form->store();

        $this->form->reset();

        $this->dispatch('manufacturer-saved');

        $this->resetPage();
    }

    public function viewManufacturer(Manufacturer $manufacturer)
    {
        $this->isView = true;
        $this->selectedManufacturer = $manufacturer
            ->with(['products'])
            ->first();
    }

    public function mount()
    {
        $this->vendor = session()->get('vendor');
        $this->business = $this->vendor->businesses->first();
    }

    public function render()
    {
        $manufacturerQuery = Manufacturer::query();

        // search
        if ($this->search) {
            $manufacturerQuery->where('business_id', $this->business->id)
                ->where('first_name', 'like', '%'. $this->search. '%')
                ->orWhere('last_name', 'like', '%'. $this->search . '%')
                ->orWhere('email', 'like', '%'. $this->search . '%');
        }

        $manufacturerQuery->where('business_id', $this->business->id)
            ->latest();

        $this->manufacturerCount = $manufacturerQuery->count();

        return view('livewire.inventory.manufacturers.index', [
            'manufacturers' => $manufacturerQuery->paginate($this->perPage),
        ]);
    }
}
