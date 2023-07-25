<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\Product;
use App\Models\Complaint;
use App\Models\Transaction;
use App\Models\Blog;

class WelcomeController extends Controller
{
    public function index()
    {
        $userLoginTime = auth()->user()->login_time;

        // Itung semua model ke view
        $totalUsers = User::count();
        $totalRoles = Role::count();
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        $totalComplaints = Complaint::count();
        $totalTransactions = Transaction::count();
        $totalBlogs = Blog::count();
        $users = User::all();
        $blogs = Blog::all();

        return view('user.welcome', [
            'totalUsers' => $totalUsers,
            'totalRoles' => $totalRoles,
            'totalCategories' => $totalCategories,
            'totalProducts' => $totalProducts,
            'totalComplaints' => $totalComplaints,
            'totalTransactions' => $totalTransactions,
            'totalBlogs' => $totalBlogs,
            'users' => $users,
            'blogs' => $blogs,
        ]);
    }
}
