<?php

namespace App\Livewire\Sales;

use App\Models\Order;
use Livewire\Component;

class PointOfSale extends Component
{
    public function render()
    {
        return view('livewire.sales.point-of-sale', [
            'order' => Order::query()->first()
        ]);
    }
}
