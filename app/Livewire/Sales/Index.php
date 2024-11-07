<?php

namespace App\Livewire\Sales;

use App\Actions\ProductFilters;
use App\Actions\SaleAnalytics;
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
        $salesQuery = (new SaleAnalytics());
        $vendor = session()->get('vendor');

        $query = Order::query()->where('user_id', $user->id);

        $pendingOrders = Order::query()
            ->where('vendor_id', $vendor->id)
            ->where('status', 'pending')
            ->latest()
            ->simplePaginate(10);

        $completedOrders = Order::query()
            ->where('vendor_id', $vendor->id)
            ->whereIn('status', ['delivered', 'shipping'])
            ->latest()
            ->paginate(10);

        $orders = Order::query()
            ->where('vendor_id', $vendor->id)
            ->latest()
            ->paginate(10);

        return view('livewire.sales.index', [
            'orders' => $orders,
            'pendingOrders' => $pendingOrders,
            'completedOrders' => $completedOrders,
            'todaySales' => $salesQuery->getTodaySales()->with(['products'])->latest()->get(),
            'topProducts' => (new ProductFilters())->topProducts(5)
        ]);
    }
}
