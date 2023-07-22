<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            Session::flash('error', 'Silahkan login terlebih dahulu ygy');
            return route('login');
        }
    }
}
