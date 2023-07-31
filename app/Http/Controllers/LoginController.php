<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            // Pengguna sudah login, Anda dapat mengakses properti login_time
            $loginTime = auth()->user()->login_time;
            return redirect()->back();
        } else {
            return view('user.login');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            $user = Auth::user();
            $user->login_time = Carbon::now();
            $user->save();
            Session::flash('login', ' Kamu berhasil login');
            return redirect()->intended('home');
            // dd($data);
        } else {
            Session::flash('error', 'email/password ada yang salah nih');
            return redirect('login')->withInput($request->except('password'));
            // dd('gagal');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flash('update', 'Anda telah logout, silahkan login kembali');
        return redirect('/login');
    }
}
