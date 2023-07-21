<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ShareUserData
{
    public function handle(Request $request, Closure $next)
    {
        // Mendapatkan user yang sedang login (jika ada)
        $user = Auth::user();

        // Menggunakan view()->share() untuk membagikan data ke semua view
        View::share('user', $user);

        return $next($request);
    }
}
