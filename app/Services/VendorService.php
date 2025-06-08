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
    private Model|null $vendor;
    protected Builder|null $businessQuery;
    protected Builder|null $vendorQuery;

    public function __construct()
    {
        // set vendor and business
        $this->setVendor();
    }

    public function getVendor(): Model|null
    {
        return cache('vendor', $this->vendor);
    }

    public function setVendor(): static
    {
        $this->vendor = cache()->remember('vendor', now()->addDay(), function () {
            return Vendor::query()->where('username', config('app.vendor.username'))->first();
        });
        session()->put('vendor', $this->vendor);
        return $this;
    }

    public static function getStaticVendor(): Model|null
    {
        $service = new static();
        return $service->getVendor();
    }

    public static function getId(): ?int
    {
        $vendor = static::getStaticVendor();
        return $vendor?->id;
    }
}
