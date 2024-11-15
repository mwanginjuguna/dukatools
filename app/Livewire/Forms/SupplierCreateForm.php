<?php

namespace App\Livewire\Forms;

use App\Models\Location;
use App\Models\Supplier;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SupplierCreateForm extends Form
{
    #[Validate('required')]
    public string $firstName = '';

    #[Validate('required')]
    public string $lastName = '';

    #[Validate('required')]
    public string $email = '';

    public string $name = '';

    public string $phone = '';

    public string $location = '';
    public int $businessId = 1;

    public function store()
    {
        $this->validate();

        if (Str::length($this->location) > 0) {
            $loc = Location::create([
                'country' => $this->location,
                'name' =>  $this->location
            ]);
        }

        $supplier = Supplier::create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'phone_number' => $this->phone,
            'location_id' => $loc->id?? null,
        ]);


        $this->reset();
    }
}
