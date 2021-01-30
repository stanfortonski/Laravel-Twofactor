<?php

namespace Stanfortonski\Laraveltwofactor\Routes;

use Illuminate\Support\Facades\Route;
use Stanfortonski\Laraveltwofactor\Controllers\TwoFactorController;
use Stanfortonski\Laraveltwofactor\Controllers\TwoFactorPreferencesController;

Route::group([
    'name' => 'twofactor.',
    'middleware' => config('twofactor.middleware')
], function(){
    Route::get('verify/resend', [TwoFactorController::class, 'resend'])->name('verify.resend');
    Route::resource('verify', TwoFactorController::class)->only(['index', 'store']);

    if (config('twofactor.allow_preferences')){
        Route::put('verify/set', [TwoFactorPreferencesController::class, 'set'])->name('verify.preferences.set');
        Route::delete('verify/unset', [TwoFactorPreferencesController::class, 'unset'])->name('verify.preferences.unset');
    }
});