<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class Role
{
    public function handle(Request $request, Closure $next)
    {
        $allowedRoles = ['superadmin', 'walikelas']; // Daftar peran yang diizinkan

        if (auth()->check() && in_array(auth()->user()->role, $allowedRoles)) {
            return $next($request);
        }

        // return redirect('/')->with('error', 'Permission Denied!!! You do not have administrative access.');
        Session::flash('error', 'Permission Denied!!! You do not have administrative access!');
        return redirect('/');
    }
}
