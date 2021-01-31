<?php

namespace Stanfortonski\Laraveltwofactor\Routes;

use Illuminate\Support\Facades\Route;
use Stanfortonski\Laraveltwofactor\Controllers\TwoFactorPreferencesController;

Route::put('twofactor/preferences', [TwoFactorPreferencesController::class, 'index'])->name('preferences.index');
Route::put('twofactor/preferences/set', [TwoFactorPreferencesController::class, 'set'])->name('preferences.set');
Route::delete('twofactor/preferences/unset', [TwoFactorPreferencesController::class, 'unset'])->name('preferences.unset');