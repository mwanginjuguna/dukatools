<?php

namespace App\Livewire\Forms;

use App\Models\Customer;
use App\Models\Location;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CustomerCreateForm extends Form
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

    public function store()
    {
        $this->validate();

        if (Str::length($this->location) > 0) {
            $loc = Location::create([
                'country' => $this->location,
                'name' =>  $this->location
            ]);
        }

        $customer = Customer::create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'phone_number' => $this->phone,
            'location_id' => $loc->id?? null,
        ]);

        $this->reset();
    }
}