<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LoggedInTime
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sudah terautentikasi
        if (auth()->check()) {
            //Mendapatkan waktu login dari user
            $userLoginTime = auth()->user()->login_time;
            // Menghitung selisih waktu dalam menit sejak login
            $loggedInTime = Carbon::parse($userLoginTime)->diffInMinutes(Carbon::now());
            //Konversi ke jam jika waktu lebih dari 60 menit (1 jam)
            if ($loggedInTime > 60) {
                $hours = floor($loggedInTime / 60);
                $messageLoginTime = 'LOGGED IN <b><font color=red>' . $hours . '</font></b> HOURS AGO';
            } elseif ($loggedInTime < 3) {
                // Jika waktu login kurang dari 1 menit tetapi kurang dari 60 menit
                $messageLoginTime = '<span style="text-transform: none;color:#98a6ad;">Just logged in a few minutes ago</span> ('. $loggedInTime.' minute ago)';
            } else {
                $messageLoginTime = 'LOGGED IN <b><font color=red>' . $loggedInTime . '</font></b> MIN AGO';
            }

            // Tambahkan variabel $messageLoginTime ke view agar dapat digunakan di seluruh view
            view()->share('messageLoginTime', $messageLoginTime);
        } else {
            // Jika pengguna belum terautentikasi, set default $messageLoginTime
            $messageLoginTime = 'Tidak ada user yang login';
            view()->share('messageLoginTime', $messageLoginTime);
        }

        return $next($request);
    }
}
