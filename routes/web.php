<?php

namespace Stanfortonski\Laraveltwofactor\Routes;

use Illuminate\Support\Facades\Route;
use Stanfortonski\Laraveltwofactor\Controllers\TwoFactorController;

Route::get('verify/resend', [TwoFactorController::class, 'resend'])->name('verify.resend');
Route::resource('verify', TwoFactorController::class)->only(['index', 'store']);
