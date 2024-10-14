<?php

namespace App\Livewire\Inventory\Supplier;

use App\Models\Supplier;
use Livewire\Component;

class Index extends Component
{
    public int $supplierCount = 0;
    public int $perPage = 3;
    public string $search = '';
    public function render()
    {
        $supplierQuery = Supplier::query()->with(['user'])->whereHas('user')->latest();
        $this->supplierCount = $supplierQuery->count();

        return view('livewire.inventory.supplier.index', [
            'suppliers' => $supplierQuery->paginate(perPage: $this->perPage)
        ]);
    }
}
