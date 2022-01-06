<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Pagination BS
        Paginator::useBootstrap();

        // New Gate
        Gate::define('admin', function (User $user) {
            return $user->role === 'Admin';
        });

        // Gate Dokter
        Gate::define('dokter', function (User $user) {
            return $user->role === 'Dokter';
        });

        // Gate Kasir
        Gate::define('kasir', function (User $user) {
            return $user->role === 'Kasir';
        });

        // Gate Apoteker
        Gate::define('apoteker', function (User $user) {
            return $user->role === 'Apoteker';
        });
    }
}
