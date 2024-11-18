<?php

namespace App\Livewire\Forms;

use App\Models\Branch;
use App\Models\Business;
use App\Models\Location;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BusinessEditForm extends Form
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
    public string $country = 'Kenya';
    public string $zipCode = '';
    public int $vendorId = 0;
    public int $locationId = 0;

    public bool $isEdit = false;

    public function save()
    {
        $this->validate();
        // Save business and Location data
        $location = Location::query()->whereKey($this->locationId)->first();

        if (!$location) {
            $location = Location::create([
                'name' => $this->address,
                'address' => $this->address,
                'county' => $this->county,
                'town' => $this->town,
                'country' => $this->country,
                'code' => $this->zipCode,
            ]);
        } else {
            $location->update([
                'name' => $this->address,
                'address' => $this->address,
                'county' => $this->county,
                'town' => $this->town,
                'country' => $this->country,
                'code' => $this->zipCode,
            ]);
        }

        $this->locationId = $location->id;

        $business = Business::updateOrCreate([
            'email' => $this->email,
            'user_id' => auth()->id(),
            'vendor_id' => $this->vendorId,
        ],[
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'phone_number' => $this->phone,
            'description' => $this->description,
            'website' => $this->website,
            'logo' => $this->logo,
            'location_id' => $location->id,
            'user_id' => auth()->id(),
            'vendor_id' => $this->vendorId,
        ]);
    }
}
