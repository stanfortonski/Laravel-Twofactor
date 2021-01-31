<?php

namespace Stanfortonski\Laraveltwofactor;

use Illuminate\Support\Facades\Route;

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

        Route::group($this->routeConfig(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });

        if (config('twofactor.preferences.allow')){
            Route::group($this->routePreferencesConfig(), function () {
                $this->loadRoutesFrom(__DIR__.'/../routes/web-preferences.php');
            });
        }

        $this->publishes([
            __DIR__ . '/../config/twofactor.php' => config_path('twofactor.php'),
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/twofactor'),
            __DIR__.'/../resources/views' => resource_path('views/vendor/twofactor')
        ]);
    }

    protected function routeConfig(){
        return [
            'as' => 'twofactor.',
            'middleware' => config('twofactor.middleware'),
            'domain' => config('twofactor.domain')
        ];
    }

    protected function routePreferencesConfig(){
        return [
            'as' => 'twofactor.',
            'middleware' => config('twofactor.preferences.middleware'),
            'domain' => config('twofactor.preferences.domain')
        ];
    }
}
