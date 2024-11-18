<?php

namespace App\Livewire\Forms;

use App\Models\Location;
use App\Models\Manufacturer;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ManufacturerCreateForm extends Form
{
    #[Validate('required')]
    public string $firstName = '';

    #[Validate('required')]
    public string $lastName = '';

    #[Validate('required')]
    public string $email = '';

    public string $name = '';

    public string $phone = '';

    public string $location = 'Kenya';
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

        $manufacturer = Manufacturer::create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'phone_number' => $this->phone,
            'location_id' => $loc->id ?? null,
            'business_id' => $this->businessId,
        ]);

        $this->reset();
    }
}
