<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\Product;
use App\Models\Complaint;
use App\Models\Transaction;

class WelcomeController extends Controller
{
    public function index()
    {

        // Itung semua model ke view
        $totalUsers = User::count();
        $totalRoles = Role::count();
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        $totalComplaints = Complaint::count();
        $totalTransactions = Transaction::count();

        return view('user.welcome', [
            'totalUsers' => $totalUsers,
            'totalRoles' => $totalRoles,
            'totalCategories' => $totalCategories,
            'totalProducts' => $totalProducts,
            'totalComplaints' => $totalComplaints,
            'totalTransactions' => $totalTransactions,
        ]);
    }
}
