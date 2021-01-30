<?php

namespace Stanfortonski\Laraveltwofactor\Controllers;

use Stanfortonski\Laraveltwofactor\Notifications\TwoFactorCode;
use Illuminate\Http\Request;

class TwoFactorController extends Controller
{
    public function index()
    {
        if (!empty(auth()->user()->two_factor_code))
            return view(config('twofactor.view'));
        return redirect()->route(config('twofactor.routes.return'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'two_factor_code' => 'integer|required'
        ]);

        $user = auth()->user();
        if ($request->two_factor_code == $user->two_factor_code){
            $user->resetTwoFactorCode();
            return redirect()->route(config('twofactor.routes.successful'));
        }
        return redirect()->back()->withError(__('twofactor.routes.error'));
    }

    public function resend()
    {
        $user = auth()->user();
        if (!empty($user->two_factor_code)){
            $user->generateTwoFactorCode();
            $user->notify(new TwoFactorCode());
            return redirect()->back()->withSuccess(__('twofactor.send_again'));
        }
        return redirect()->route(config('twofactor.routes.return'));
    }
}
