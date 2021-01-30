<?php

namespace Stanfortonski\Laraveltwofactor\Controllers;

use Illuminate\Routing\Controller;

class TwoFactorController extends Controller
{
    public function set()
    {
        $user = auth()->user();
        $user->enable_two_factor = true;
        $user->update();

        return redirect()->back()->withSuccess(__('twofactor.preferences.set'));
    }

    public function unset()
    {
        $user = auth()->user();
        $user->enable_two_factor = false;
        $user->update();

        return redirect()->back()->withSuccess(__('twofactor.preferences.unset'));
    }
}