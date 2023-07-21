<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ResetPasswordController extends Controller
{
    // Method untuk menampilkan form reset password
    public function showResetForm(Request $request, $token = null)
    {
        return view('user.reset')->with(['token' => $token, 'email' => $request->email]);
    }

    // Method untuk melakukan reset password
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $status = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function ($user, $password) {
            $user->forceFill([
                'password' => bcrypt($password)
            ])->setRememberToken(\Illuminate\Support\Str::random(60));

            $user->save();

            // Atur aksi setelah password direset, misal redirect ke halaman tertentu.
            Session::flash('reset', ' Password berhasil di update, silahkan login kembali');
            return redirect()->route('home');
        });

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
