<?php

namespace App\Livewire\Inventory\Suppliers;

use App\Livewire\Forms\SupplierCreateForm;
use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public SupplierCreateForm $form;
    public int $supplierCount = 0;
    public int $perPage = 15;
    public string $search = '';
    public $vendor;

    public function saveSupplier()
    {
        $this->form->businessId = $this->vendor->businesses->first()->id;
        $this->form->store();

        $this->form->reset();

        $this->dispatch('supplier-saved');
        $this->resetPage();
    }

    public function mount()
    {
        $this->vendor = session()->get('vendor');
        $this->form->businessId = $this->vendor->businesses->first()->id;
    }

    public function render()
    {
        $supplierQuery = Supplier::query()
            ->where('business_id', $this->form->businessId)
            ->latest();
        $this->supplierCount = $supplierQuery->count();

        return view('livewire.inventory.suppliers.index', [
            'suppliers' => $supplierQuery->paginate(perPage: $this->perPage)
        ]);
    }
}
