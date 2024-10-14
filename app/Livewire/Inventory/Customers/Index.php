<?php

namespace App\Livewire\Inventory\Customers;

use App\Models\Customer;
use Livewire\Component;

class Index extends Component
{
    public int $customerCount = 0;
    public int $perPage = 3;
    public float $totalCustomerValue = 0;
    public float $averageCustomerValue = 0;
    public int $averageOrderCount = 0;
    public float $averageOrderValue = 0;

    public function render()
    {
        $customerQuery = Customer::query()->with(['user'])->whereHas('user')->latest();

        $this->customerCount = $customerQuery->count();

        return view('livewire.inventory.customers.index', [
            'customers' => $customerQuery->paginate($this->perPage)
        ]);
    }
}
