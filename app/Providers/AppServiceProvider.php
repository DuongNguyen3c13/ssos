<?php

namespace App\Providers;

use App\Services\Interfaces\UserLoginServiceInterface;
use App\Services\UserLoginService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserLoginServiceInterface::class, function() {
            return new UserLoginService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
