<?php

namespace App\Providers;

use App\Services\VendorService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class VendorServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(VendorService::class, function ($app) {
            return new VendorService();
        });
    }

    /*
     * Service provides
     */
    public function provides()
    {
        return [VendorService::class];
    }
}
