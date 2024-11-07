<?php

namespace App\Livewire\Inventory\Customers;

use App\Livewire\Forms\CustomerCreateForm;
use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public CustomerCreateForm $form;
    public int $customerCount = 0;
    public int $perPage = 3;
    public float $totalCustomerValue = 0;
    public float $averageCustomerValue = 0;
    public int $averageOrderCount = 0;
    public float $averageOrderValue = 0;

    public function saveCustomer()
    {
        $this->form->store();

        $this->form->reset();

        $this->dispatch('customer-saved');
    }

    public function render()
    {
        $vendor = session()->get('vendor');

        $customerQuery = Customer::query()->where('vendor_id', $vendor->id)->latest();

        $this->customerCount = $customerQuery->count();

        return view('livewire.inventory.customers.index', [
            'customers' => $customerQuery->paginate($this->perPage)
        ]);
    }
}
