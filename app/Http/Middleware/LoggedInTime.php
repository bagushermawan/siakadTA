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
            // Mendapatkan waktu login dari user
            $userLoginTime = auth()->user()->login_time;

            if ($userLoginTime) {
                // Menghitung selisih waktu sejak login dalam menit
                $loggedInTime = Carbon::parse($userLoginTime)->diffInMinutes(Carbon::now());

                if ($loggedInTime > 60 * 24) {
                    // Lebih dari satu hari, hitung selisih dalam hari, jam, dan menit
                    $days = floor($loggedInTime / (60 * 24));
                    $hours = floor(($loggedInTime - ($days * 60 * 24)) / 60);
                    $minutes = $loggedInTime - ($days * 60 * 24) - ($hours * 60);
                    $messageLoginTime = 'LOGGED IN <b><font color=red>' . $days . ' days ' . $hours . ' hours ' . $minutes . ' minutes</font></b> AGO';
                } elseif ($loggedInTime > 60) {
                    // Lebih dari satu jam, hitung selisih dalam jam dan menit
                    $hours = floor($loggedInTime / 60);
                    $minutes = $loggedInTime - ($hours * 60);
                    $messageLoginTime = 'LOGGED IN <b><font color=red>' . $hours . ' hours ' . $minutes . ' minutes</font></b> AGO';
                } elseif ($loggedInTime < 3) {
                    $messageLoginTime = '<span style="text-transform: none;color:#98a6ad;">Just logged in a few minutes ago</span> (' . $loggedInTime . ' minute ago)';
                } else {
                    $messageLoginTime = 'LOGGED IN <b><font color=red>' . $loggedInTime . ' minutes</font></b> AGO';
                }
            } else {
                $messageLoginTime = 'Tidak ada data waktu login.';
            }
        } else {
            $messageLoginTime = 'Tidak ada user yang login';
        }

        // Tambahkan variabel $messageLoginTime ke view agar dapat digunakan di seluruh view
        view()->share('messageLoginTime', $messageLoginTime);

        return $next($request);
    }
}
