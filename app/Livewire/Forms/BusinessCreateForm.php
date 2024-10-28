<?php

namespace App\Livewire\Forms;

use App\Models\Business;
use App\Models\Location;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BusinessCreateForm extends Form
{
    #[Validate('required')]
    public string $name = '';

    public string $email = '';
    public string $phone = '';
    public string $description = '';
    public string $website = '';
    public string $logo = '';
    public string $address = '';
    public string $town = '';
    public string $county = '';
    public string $country = '';
    public string $zipCode = '';

    public function save()
    {
        $this->validate();
        // Save business and Location data
        $location = Location::create([
            'name' => $this->address,
            'address' => $this->address,
            'county' => $this->county,
            'town' => $this->town,
            'country' => $this->country,
            'code' => $this->zipCode,
        ]);

        $business = Business::create([
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'phone_number' => $this->phone,
            'description' => $this->description,
            'website' => $this->website,
            'logo' => $this->logo,
            'location_id' => $location->id,
            'user_id' => auth()->id(),
            'vendor_id' => auth()->id(),
        ]);
    }
}
