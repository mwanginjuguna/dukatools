<?php

namespace App\Livewire\Sales;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $user = Auth::user();

        $query = Order::query()->where('user_id', $user->id);

        $pendingOrders = Order::query()
            ->where('status', 'pending')->simplePaginate(10);

        $completedOrders = Order::query()
            ->whereIn('status', ['delivered', 'shipping'])
            ->paginate(10);

        $orders = Order::query()
            ->paginate(10);

        return view('livewire.sales.index', [
            'orders' => $orders,
            'pendingOrders' => $pendingOrders,
            'completedOrders' => $completedOrders,
        ]);
    }
}