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
    public int $perPage = 3;

    public bool $isView = false;
    public object $selectedManufacturer;

    public function saveManufacturer()
    {
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

    public function render()
    {
        $vendor = session()->get('vendor');
        $manufacturerQuery = Manufacturer::query()
            ->where('vendor_id', $vendor->id)
            ->whereHas('products')
            ->latest();

        $this->manufacturerCount = $manufacturerQuery->count();

        return view('livewire.inventory.manufacturers.index', [
            'manufacturers' => $manufacturerQuery->paginate($this->perPage),
        ]);
    }
}
