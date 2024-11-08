<?php

namespace App\Livewire\Pages;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardStats extends Component
{
    public object $orders;
    public object $vendor;

    public function mount()
    {
        $this->vendor = session()->get('vendor');
        $this->orders = Order::query()->where('vendor_id', $this->vendor->id)->get();
    }

    public function render()
    {
        return view('livewire.pages.dashboard-stats');
    }
}
