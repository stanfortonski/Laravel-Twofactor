# Laravel-Twofactor
Two-factor authentication package for Laravel 7.x and 8.x via e-mail.

# Information
This package provides you to set of middleware, view, migration, routes with controllers, transaltions and methods to user model which allow you to set up 2FA vie email for your application.

# Installation
1. First install package via composer. Run `composer require stanfortonski/laravel-twofactor`.
2. Setup provider. In config/app.php add following code to bottom of providers:
```php
'providers' => [
    //...
    Stanfortonski\Laraveltwofactor\ServiceProvider::class
],
```
3. Setup middleware. In app/Http/Kernel.php add following code to bottom of middlewares:
```php
protected $routeMiddleware = [
    //...
    'twofactor' => \Stanfortonski\Laraveltwofactor\Middleware\TwoFactor::class
];
```
5. Use \Stanfortonski\Laraveltwofactor\Traits\TwoFactorable trait in User class with \Illuminate\Notifications\Notifiable. Snippet: `use Notifiable, TwoFactorable;`
4. You have to publish config file twofactor.php. Run command: `php artisan vendor:publish --provider="Stanfortonski\Laraveltwofactor\ServiceProvider"`.
5. Run `php artisan migrate`.
6. Add line `$user->startTwoFactor()` in your login process. For example in Laravel/ui add this line in Auth\LoginController@authenticated method before redirect.
7. Set up your email in .env.

# Configuration
In config/twofactor.php
1. If you want to disable twofactor/preferences routes set `preferences.allow` to false.
2. If you want to change expire time of 2FA code you will change `expire_duration`. Default value is 15 minutes.
3. Look at routes.login, routes.successful and routes.return that must be real routes name in your application. More in file itself.

# Usage
You have to set twofactor middleware in routes. The way depends on you.

Example:
```php
    Route::get('/home', function(){
        return view('home');
    })->middleware(['auth', 'twofactor']);
```
