<?php

namespace App\Livewire\Inventory\Manufacturer;

use App\Models\Manufacturer;
use Livewire\Component;

class Index extends Component
{
    public int $manufacturerCount = 0;
    public int $perPage = 3;

    public function render()
    {
        $manufacturerQuery = Manufacturer::query()->with(['user'])->whereHas('user')->latest();

        $this->manufacturerCount = $manufacturerQuery->count();

        return view('livewire.inventory.manufacturer.index', [
            'manufacturers' => $manufacturerQuery->paginate($this->perPage),
        ]);
    }
}
