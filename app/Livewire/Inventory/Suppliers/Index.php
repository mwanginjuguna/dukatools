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
    public $business;

    public function saveSupplier()
    {
        $this->form->businessId = $this->business->id;
        $this->form->store();

        $this->form->reset();

        $this->dispatch('supplier-saved');
        $this->redirectRoute('vendor.suppliers');
    }

    public function mount()
    {
        $this->vendor = session()->get('vendor');
        $this->business = $this->vendor->businesses->first();
    }

    public function render()
    {
        $supplierQuery = Supplier::query();

        if ($this->search !== '') {
            $supplierQuery->where('business_id', $this->business->id)
                ->where('first_name', 'like', '%'. $this->search. '%')
                ->orWhere('last_name', 'like', '%'. $this->search . '%')
                ->orWhere('email', 'like', '%'. $this->search . '%');
        }

        $supplierQuery->where('business_id', $this->business->id);

        $this->supplierCount = $supplierQuery->count();

        return view('livewire.inventory.suppliers.index', [
            'suppliers' => $supplierQuery
                ->latest()
                ->paginate(perPage: $this->perPage)
        ]);
    }
}
