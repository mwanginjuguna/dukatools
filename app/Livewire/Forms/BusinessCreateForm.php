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

        $user = User::query()->whereKey(auth()->id());
        $vendor = Vendor::create([
            'username' => $user->name,
        ]);

        $user->userable_id = $vendor->id;
        $user->userable_type = Vendor::class;
        $user->save();

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
            'vendor_id' => $vendor->id,
        ]);

        Branch::create([
            'name' => 'Main',
            'phone_number' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'location_id' => $location->id,
            'business_id' => $business->id,
        ]);
    }
}
