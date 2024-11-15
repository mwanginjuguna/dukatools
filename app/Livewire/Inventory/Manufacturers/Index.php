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

    public bool $isView = false;
    public object $selectedManufacturer;

    public object $vendor;

    public function saveManufacturer()
    {
        $this->form->businessId = $this->vendor->businesses->first()->id;
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
        $this->form->businessId = $this->vendor->businesses->first()->id;
    }

    public function render()
    {
        $manufacturerQuery = Manufacturer::query()
            ->where('business_id', $this->form->businessId)
            ->whereHas('products')
            ->latest();

        $this->manufacturerCount = $manufacturerQuery->count();

        return view('livewire.inventory.manufacturers.index', [
            'manufacturers' => $manufacturerQuery->paginate($this->perPage),
        ]);
    }
}
