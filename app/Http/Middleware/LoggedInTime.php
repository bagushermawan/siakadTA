<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LoggedInTime
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //Mendapatkan waktu login dari user
        $userLoginTime = auth()->user()->login_time;
        // Menghitung selisih waktu dalam menit sejak login
        $loggedInTime = Carbon::parse($userLoginTime)->diffInMinutes(Carbon::now());
        //Konversi ke jam jika waktu lebih dari 60 menit (1 jam)
        if ($loggedInTime > 60) {
            $hours = floor($loggedInTime / 60);
            $messageLoginTime = "LOGGED IN " . $hours . " HOURS AGO";
        } else {
            $messageLoginTime = "LOGGED IN <b><font color=red>" . $loggedInTime . "</font></b> MIN AGO";
        }

        // Tambahkan variabel $messageLoginTime ke view agar dapat digunakan di seluruh view
        view()->share('messageLoginTime', $messageLoginTime);
        return $next($request);
    }
}
