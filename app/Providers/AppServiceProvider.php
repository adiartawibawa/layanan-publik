<?php

namespace App\Providers;

use App\View\Composers\AppSettingComposer;
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
        view()->composer('layouts.landing.main', AppSettingComposer::class);
        view()->composer('layouts.landing.hero', AppSettingComposer::class);
        view()->composer('welcome', AppSettingComposer::class);
    }
}
