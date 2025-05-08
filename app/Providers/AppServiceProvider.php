<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Explicitly register the filesystem service
        // $this->app->singleton('files', function () {
        //     return new Filesystem();
        // });
        
        // You can keep any other services you've registered here
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}