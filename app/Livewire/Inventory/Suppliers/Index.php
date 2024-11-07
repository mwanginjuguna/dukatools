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
    public int $perPage = 4;
    public string $search = '';

    public function saveSupplier()
    {
        $this->form->store();

        $this->form->reset();

        $this->dispatch('supplier-saved');
        $this->resetPage();
    }

    public function render()
    {
        $vendor = session()->get('vendor');

        $supplierQuery = Supplier::query()
            ->where('vendor_id', $vendor->id)
            ->latest();
        $this->supplierCount = $supplierQuery->count();

        return view('livewire.inventory.suppliers.index', [
            'suppliers' => $supplierQuery->paginate(perPage: $this->perPage)
        ]);
    }
}
