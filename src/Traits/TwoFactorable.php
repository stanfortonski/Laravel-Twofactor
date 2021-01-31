<?php

namespace Stanfortonski\Laraveltwofactor\Traits;

use Stanfortonski\Laraveltwofactor\Notifications\TwoFactorCode;

trait TwoFactorable
{
    public function generateTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = rand(100000, 999999);
        $this->two_factor_expires_at = now()->addMinutes(config('twofactor.expire_duration'));
        $this->save();
    }

    public function resetTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }

    public function startTwoFactor()
    {
        if ($this->enabled_two_factor){
            $this->generateTwoFactorCode();
            $this->notify(new TwoFactorCode());
        }
    }
}
