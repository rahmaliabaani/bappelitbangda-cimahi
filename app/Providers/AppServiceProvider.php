<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // Gate: Gerbang dengan nama admin, ini hanya bisa diakses oleh User yang is_admin = true
        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });

        // Gate: Gerbang dengan nama staf, ini hanya bisa diakses oleh User yang is_admin = false
        Gate::define('staf', function (User $user) {
            return $user->is_admin == 0;
        });
    }
}
