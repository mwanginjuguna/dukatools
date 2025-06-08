<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use Illuminate\Support\Collection;
use Livewire\Component;

class ListTable extends Component
{
    private Collection $orders;

    public string $listTitle;

    public function mount(Collection $orders = null, $listTitle = 'My')
    {
        $this->listTitle = $listTitle;
        if ($orders === null || $orders->isEmpty())
        {
            $orders = Order::query()->latest()->get();
        }

        $this->orders = $orders;
    }
    public function render()
    {
        return view('livewire.orders.list-table', [
            'orders' => $this->orders
        ]);
    }
}
