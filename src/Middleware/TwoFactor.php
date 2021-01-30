<?php

namespace Stanfortonski\Laravelroles\Middleware;

use Closure;

class TwoFactor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        if (auth()->check() && $user->enable_two_factor && $user->two_factor_code){
            if ($user->two_factor_expires_at->lt(now())){
                $user->resetTwoFactorCode();
                auth()->logout();
                return redirect()->route(config('twofactor.routes.login'))->withError(__('twofactor.expire_info'));
            }

            if (!$request->is('verify*')){
                return redirect()->route('twofactor.verify.index');
            }
        }
        return $next($request);
    }
}
