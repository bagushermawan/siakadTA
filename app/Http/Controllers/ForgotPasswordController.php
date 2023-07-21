<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('user.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Cek apakah link reset password berhasil dikirimkan
        if ($status === Password::RESET_LINK_SENT) {
            // Jika berhasil, tambahkan session flash dengan pesan sukses
            return back()->with('forgot', 'Link reset password telah dikirimkan ke email Anda.');
        } else {
            // Jika gagal, tambahkan session flash dengan pesan error
            return back()->withErrors(['email' => __($status)]);
        }
    }
}
