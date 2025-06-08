<?php

namespace App\Providers;

use App\Services\BusinessService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\ServiceProvider;

class BusinessServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // register business service
        $this->app->singleton('business', function () {
            return new BusinessService();
        });
    }

    /*
     * Services provides
     */
    public function provides()
    {
        return [BusinessService::class];
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
