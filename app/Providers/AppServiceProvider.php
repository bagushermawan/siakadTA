<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use App\Helpers\Helper;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        App::singleton('Helper', function () {
            return new Helper;
        });
        View::share('currentUserRole', Auth::user() ? Auth::user()->role : null);

    }
}
