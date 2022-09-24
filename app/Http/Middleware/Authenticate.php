<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request;


class Authenticate extends Middleware
{

    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            // app()->getLocale() .
            if (Request::is('/admin/dashboard')) {
                return route('selection');
            }

            elseif(Request::is( '/customer/dashboard')) {
                return route('selection');
            }

            else {
                return route('selection');
            }
        }
    }
}
