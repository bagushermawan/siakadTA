<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Session;
// use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/a');
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
            Session::flash('login', ' Kamu berhasil login');
            return redirect('home');
            // dd($data);
        } else {
            Session::flash('error', 'Email/password ada yang salah nih');
            return redirect('login')->withInput($request->except('password'));
            // dd('gagal');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
