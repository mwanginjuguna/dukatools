<?php

namespace App\Services;

use App\Models\Branch;
use App\Models\Business;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Database\Eloquent\Model;

class BusinessService
{
    private Model|Builder|null $vendor;
    protected Builder $businessQuery;
    private Builder|null $orderQuery = null;

    /**
     * Create a new class instance.
     */
    public function __construct(public Business|Model|Builder|null $business = null)
    {
        // initialize vendor e.g. from cache
        $this->vendor = VendorService::getStaticVendor();

        // initialize business
        if (!isset($this->business))
        {
            $this->setBusiness();
        }
    }

    /*
     * Get business
     */
    public function getBusiness(): Model|null
    {
        return cache('business', $this->business);
    }

    /*
     *Initialize business property
     */
    public function setBusiness(): static
    {
        $this->setBusinessQuery();

        $this->business = cache()->remember('business', now()->addDay(), function () {
            return $this->loadBusiness();
        });

        return $this;
    }

    public function setBusinessQuery(): static
    {
        $this->businessQuery = Business::query();
        return $this;
    }

    public function loadBusiness(): Model|Builder|null
    {
        return $this->businessQuery->where('vendor_id', $this->vendor->id)->orWhere(function (Builder $query) {
            $query->oldest();
        })->first();
    }
}
