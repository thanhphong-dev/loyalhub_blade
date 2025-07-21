<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\EmployeeObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        foreach (glob(app_path('Helpers').'/*.php') as $filename) {
            require_once $filename;
        }

        User::observe(EmployeeObserver::class);
    }
}
