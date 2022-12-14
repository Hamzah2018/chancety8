<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    public function handle($request, Closure $next)
    {
        if (auth('admin')->check()) {
            return redirect(RouteServiceProvider::ADMIN);
        }
        if (auth('web')->check()) {
            return redirect(RouteServiceProvider::HOME);
        }
        if (auth('customer')->check()) {
            return redirect(RouteServiceProvider::CUSTOMER);
        }

        return $next($request);
    }


}
