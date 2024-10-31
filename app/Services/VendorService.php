<?php

namespace App\Services;

use App\Models\Business;
use App\Models\Employee;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Database\Eloquent\Model;

class VendorService
{
    public Model|null $business;
    private Model $user;
    private Model|null $vendor;
    protected Builder|null $businessQuery;
    protected Builder|null $vendorQuery;

    public function __construct()
    {
        $this->user = User::query()
            ->whereKey(auth()->id())
            ->first();

        // get the vendor id from business associated with the current user
        $this->business = $this->setBusiness();

        if ($this->business !== null) {
            $this->businessQuery = $this->business->newQuery();
            $this->vendor = $this->business->vendor;
            $this->vendorQuery = $this->vendor->newQuery();
        } else {$this->vendor = null;}
    }

    public function getVendor(): Model|null
    {
        return $this->vendor;
    }

    public function getBusiness(): Model|null
    {
        return $this->business;
    }

    /**
     * @return HigherOrderBuilderProxy|Model|mixed|object|null
     */
    public function setBusiness(): mixed
    {
        if ($this->user->isEmployee()) {
            return Employee::query()->with(['business'])->whereKey($this->user->userable_id)->first()->business;
        } else {
            return $this->user->businesses->first();
        }
    }
}
