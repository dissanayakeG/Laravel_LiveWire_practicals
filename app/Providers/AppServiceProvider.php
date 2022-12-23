<?php

namespace App\Providers;

use App\Facades\EmailService;
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

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('PostCardSingleton', function(){
            return new EmailService('US', 10, 20);
        });
    }
}
