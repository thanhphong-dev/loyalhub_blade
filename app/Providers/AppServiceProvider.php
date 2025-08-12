<?php

namespace App\Providers;

use App\Enums\CustomerServicePaymentMethod;
use App\Enums\CustomerSource;
use App\Enums\CustomerStatus;
use App\Enums\CustomerStatusPayment;
use App\Enums\ServiceStatus;
use App\Models\Customer;
use App\Models\User;
use App\Observers\CustomerObserver;
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
        Customer::observe(CustomerObserver::class);

        // view share
        View::share('serviceStatus', ServiceStatus::cases());
        View::share('customerSource', CustomerSource::cases());
        View::share('customerStatus', CustomerStatus::cases());
        View::share('customerPaymentMethods', CustomerServicePaymentMethod::cases());
        View::share('customerStatusPayments', CustomerStatusPayment::cases());
    }
}
