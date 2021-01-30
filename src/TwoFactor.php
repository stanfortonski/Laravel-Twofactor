<?php

namespace Stanfortonski\Laraveltwofactor;

use Stanfortonski\Laraveltwofactor\Notifications\TwoFactorCode;

class TwoFactor
{
    static public function sendCode($user)
    {
        if ($user->enable_two_factor){
            $user->generateTwoFactorCode();
            $user->notify(new TwoFactorCode());
        }
    }
}