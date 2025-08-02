<?php

namespace App\Providers;

use App\Enums\ServiceStatus;
use App\Models\User;
use App\Observers\EmployeeObserver;
use Illuminate\Support\Facades\View;
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
        // helper
        foreach (glob(app_path('Helpers').'/*.php') as $filename) {
            require_once $filename;
        }

        // observer
        User::observe(EmployeeObserver::class);

        // view share
        View::share('serviceStatus', ServiceStatus::cases());
    }
}
