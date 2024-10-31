<?php

namespace App\Services;

use App\Models\Business;
use App\Models\Employee;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Model;

class VendorService
{
    public Model $business;
    public Model $user;
    public Model $vendor;

    public function __construct()
    {
        $this->user = User::query()->whereKey(auth()->id())->first();
        // get the vendor id from business associated with the current user
        if ($this->user->userable_type === Employee::class) {
            $this->business = Employee::query()->with(['business'])->whereKey($this->user->userable_id)->first()->business;
        } else {
            $this->business = $this->user->userable->businesses->first();
        }
        $this->vendor = $this->business->vendor;
    }

    public function getVendor(): Model
    {
        return $this->vendor;
    }
}
