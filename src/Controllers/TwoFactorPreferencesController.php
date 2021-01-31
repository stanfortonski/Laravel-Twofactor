<?php

namespace Stanfortonski\Laraveltwofactor\Controllers;

class TwoFactorPreferencesController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view(config('twofactor.preferences.view'))->with('user', $user);  
    }

    public function set()
    {
        $user = auth()->user();
        $user->enabled_two_factor = true;
        $user->update();

        return redirect()->back()->withSuccess(__('twofactor::twofactor.preferences.set'));
    }

    public function unset()
    {
        $user = auth()->user();
        $user->enabled_two_factor = false;
        $user->update();

        return redirect()->back()->withSuccess(__('twofactor::twofactor.preferences.unset'));
    }
}
