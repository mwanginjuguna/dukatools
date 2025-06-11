<?php

namespace App\Livewire\Vendor;

use App\Livewire\Forms\BusinessEditForm;
use App\Models\Business;
use App\Models\BusinessDetails;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithFileUploads;

class BusinessSummary extends Component
{
    use WithFileUploads;

    public mixed $business;
    public mixed $vendor;
    public BusinessEditForm $editForm;
    public $currentTab = 'basic';
    public $businessLogo;
    public $businessDetails = [];
    public $location = [];
    public $branches = [];

    public function mount()
    {
        $this->vendor = Cache::get('vendor');
        $this->business = $this->loadBusiness();

        // Initialize form data
        $this->initializeFormData();
    }

    protected function loadBusiness()
    {
        $relations = ['products', 'branches', 'location', 'inventories', 'orders', 'details'];
        return Business::query()->where('vendor_id', $this->vendor->id)->with($relations)->first();
    }

    protected function initializeFormData()
    {
        // Basic business info
        $this->editForm->name = $this->business->name;
        $this->editForm->email = $this->business->email;
        $this->editForm->phone_number = $this->business->phone_number;
        $this->editForm->description = $this->business->description;
        $this->editForm->website = $this->business->website;
        $this->editForm->category = $this->business->category;

        // Location data
        if ($this->business->location) {
            $this->location = [
                'name' => $this->business->location->name,
                'address' => $this->business->location->address,
                'code' => $this->business->location->code,
                'street' => $this->business->location->street,
                'town' => $this->business->location->town,
                'city' => $this->business->location->city,
                'county' => $this->business->location->county,
                'region' => $this->business->location->region,
                'state' => $this->business->location->state,
                'country' => $this->business->location->country,
            ];
        }

        // Business details
        if ($this->business->details) {
            $this->businessDetails = [
                'legal_name' => $this->business->details->legal_name,
                'alternate_name' => $this->business->details->alternate_name,
                'business_type' => $this->business->details->business_type,
                'founding_date' => $this->business->details->founding_date,
                'tax_id' => $this->business->details->tax_id,
                'duns' => $this->business->details->duns,
                'price_range' => $this->business->details->price_range,
                'payment_accepted' => $this->business->details->payment_accepted,
                'currencies_accepted' => $this->business->details->currencies_accepted,
                'slogan' => $this->business->details->slogan,
                'awards' => $this->business->details->awards,
                'social_media' => $this->business->details->social_media,
            ];
        }

        // Branches
        $this->branches = $this->business->branches->map(function ($branch) {
            return [
                'id' => $branch->id,
                'name' => $branch->name,
                'email' => $branch->email,
                'phone_number' => $branch->phone_number,
                'address' => $branch->address,
                'location' => $branch->location ? [
                    'name' => $branch->location->name,
                    'address' => $branch->location->address,
                    'city' => $branch->location->city,
                    'county' => $branch->location->county,
                    'country' => $branch->location->country,
                ] : null,
            ];
        })->toArray();
    }

    public function editBusiness($businessId)
    {
        $this->business = Business::with(['location', 'details', 'branches'])->findOrFail($businessId);
        $this->initializeFormData();
        $this->dispatch('open-modal', 'show-business-edit-form');
    }

    public function setTab($tab)
    {
        $this->currentTab = $tab;
    }

    public function saveBasicInfo()
    {
        $this->editForm->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'description' => 'nullable|string',
            'website' => 'nullable|url|max:255',
            'category' => 'nullable|string|max:100',
        ]);

        $this->business->update([
            'name' => $this->editForm->name,
            'email' => $this->editForm->email,
            'phone_number' => $this->editForm->phone_number,
            'description' => $this->editForm->description,
            'website' => $this->editForm->website,
            'category' => $this->editForm->category,
        ]);

        if ($this->businessLogo) {
            $path = $this->businessLogo->store('business-logos', 'public');
            $this->business->update(['logo' => $path]);
        }

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Basic information updated successfully!'
        ]);
    }

    public function saveLocation()
    {
        $this->validate([
            'location.name' => 'required|string|max:255',
            'location.address' => 'required|string|max:255',
            'location.city' => 'required|string|max:255',
            'location.county' => 'required|string|max:255',
            'location.country' => 'required|string|max:255',
        ]);

        if (!$this->business->location) {
            $location = Location::create($this->location);
            $this->business->update(['location_id' => $location->id]);
        } else {
            $this->business->location->update($this->location);
        }

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Location information updated successfully!'
        ]);
    }

    public function saveBusinessDetails()
    {
        $this->validate([
            'businessDetails.legal_name' => 'nullable|string|max:255',
            'businessDetails.alternate_name' => 'nullable|string|max:255',
            'businessDetails.business_type' => 'nullable|string|max:50',
            'businessDetails.founding_date' => 'nullable|date',
            'businessDetails.tax_id' => 'nullable|string|max:50',
            'businessDetails.duns' => 'nullable|string|max:50',
            'businessDetails.price_range' => 'nullable|string|max:10',
            'businessDetails.payment_accepted' => 'nullable|string',
            'businessDetails.currencies_accepted' => 'nullable|array',
            'businessDetails.slogan' => 'nullable|string|max:255',
            'businessDetails.awards' => 'nullable|string',
            'businessDetails.social_media' => 'nullable|array',
        ]);

        if (!$this->business->details) {
            $this->business->details()->create($this->businessDetails);
        } else {
            $this->business->details->update($this->businessDetails);
        }

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Business details updated successfully!'
        ]);
    }

    public function saveBranch($index)
    {
        $this->validate([
            "branches.$index.name" => 'required|string|max:255',
            "branches.$index.email" => 'nullable|email|max:255',
            "branches.$index.phone_number" => 'nullable|string|max:20',
            "branches.$index.address" => 'required|string|max:255',
        ]);

        $branch = $this->branches[$index];

        if (isset($branch['id'])) {
            $this->business->branches()->find($branch['id'])->update($branch);
        } else {
            $this->business->branches()->create($branch);
        }

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Branch information updated successfully!'
        ]);
    }

    public function addBranch()
    {
        $this->branches[] = [
            'name' => '',
            'email' => '',
            'phone_number' => '',
            'address' => '',
        ];
    }

    public function removeBranch($index)
    {
        if (isset($this->branches[$index]['id'])) {
            $this->business->branches()->find($this->branches[$index]['id'])->delete();
        }
        unset($this->branches[$index]);
        $this->branches = array_values($this->branches);
    }

    public function render()
    {
        $latests = $this->business->orders()->latest()->limit(5)->get();
        return view('livewire.vendor.business-summary', [
            'business' => $this->business,
            'latestOrders' => $latests
        ]);
    }
}

