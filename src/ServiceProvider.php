<?php

namespace Stanfortonski\Laraveltwofactor;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/twofactor.php', 'twofactor');
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'twofactor');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'twofactor');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->publishes([
            __DIR__ . '/../config/twofactor.php' => config_path('twofactor.php'),
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/twofactor'),
            __DIR__.'/../resources/views' => resource_path('views/vendor/twofactor')
        ]);
    }
}
