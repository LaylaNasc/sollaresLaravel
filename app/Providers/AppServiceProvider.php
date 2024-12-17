<?php

namespace App\Providers;

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
        Gate::define('Admin', function() {
            $user = auth()->guard('web')->user();
            //dd($user);
            return $user && $user->cargo === 'Admin';
        });
              
        
    }
}
