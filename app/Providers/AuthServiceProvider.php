<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\ViewPolicy;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('view-dashboard',[ViewPolicy::class,'viewDashboard']);
        Gate::define('view-myorder',[ViewPolicy::class,'viewUserOrder']);


    }
}
