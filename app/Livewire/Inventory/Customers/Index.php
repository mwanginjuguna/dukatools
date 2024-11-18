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
    public int $perPage = 15;
    public string $search = '';
    public float $totalCustomerValue = 0;
    public float $averageCustomerValue = 0;
    public int $averageOrderCount = 0;
    public float $averageOrderValue = 0;

    public object $selectedCustomer;
    public object $vendor;

    public function saveCustomer()
    {
        $this->form->store();

        $this->form->reset();

        $this->dispatch('customer-saved');
    }

    public function showCustomer(Customer $customer)
    {
        $this->selectedCustomer = $customer;
        $this->dispatch('open-modal','customer-show-modal');
    }

    public function mount()
    {
        $this->vendor = session()->get('vendor');
    }

    public function render()
    {
        $vendor = $this->vendor;

        $customerQuery = Customer::query();

        $customerQuery->where('vendor_id', $vendor->id);


        // search
        if ($this->search) {
            $customerQuery->where('vendor_id', $vendor->id)
                ->where('first_name', 'like', '%'. $this->search. '%')
                ->orWhere('last_name', 'like', '%'. $this->search . '%')
                ->orWhere('email', 'like', '%'. $this->search . '%')
                ->orWhere('reference', 'like', '%'. $this->search . '%')
                ->orWhere('source', 'like', '%'. $this->search . '%');
        }

        $customerQuery->when($this->search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        });

        $this->customerCount = $customerQuery->count();

        return view('livewire.inventory.customers.index', [
            'customers' => $customerQuery->latest()->paginate($this->perPage)
        ]);
    }
}
