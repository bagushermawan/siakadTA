<?php

namespace App\Helpers;

use Illuminate\Support\Carbon;

class Helper
{
    public static function formatLastLogin($loginTime)
    {
        if (!$loginTime) {
            return '-';
        }

        $now = Carbon::now();
        $lastLogin = Carbon::parse($loginTime);

        if ($lastLogin->diffInMinutes($now) < 60) {
            return $lastLogin->diffInMinutes($now) . ' minutes ago';
        } elseif ($lastLogin->diffInHours($now) < 24) {
            return $lastLogin->diffInHours($now) . ' hours ago';
        } else {
            return $lastLogin->format('d M Y, H:i');
        }
    }
}
