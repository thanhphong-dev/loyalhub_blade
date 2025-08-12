<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('permissions')) {
            if (Permission::count() > 0) {
                $permissions = Permission::all();

                foreach ($permissions as $permission) {
                    Gate::define($permission->slug, function (User $user) use ($permission) {
                        return $user->hasPermission($permission->slug);
                    });
                }
            }
        }
    }
}
