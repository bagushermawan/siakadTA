<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class WelcomeController extends Controller
{
    public function index()
    {
        $userLoginTime = auth()->user()->login_time;

        // Itung semua model ke view
        $totalUsers = User::count();
        $totalRoles = Role::count();
        $users = User::all();
        $roles = Role::all();

        return view('user.welcome', [
            'totalUsers' => $totalUsers,
            'totalRoles' => $totalRoles,
            'users' => $users,
            'roles' => $roles,
        ]);
    }
}
