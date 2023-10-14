<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
// use App\Models\Blog;
use App\Models\Ask;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        $currentUserRole = Auth::check() ? Auth::user()->role : 'guest';
        // $blogs = Blog::all();
        // $asks = Ask::all();
        return view('layouts.front.resi', compact('currentUserRole'));
    }

    public function resi()
    {
        // $resi = Transaction::all();
        // $transactions = Transaction::paginate(10);
        // return view('layouts.front.cekresi', compact('resi'));
        $currentUserRole = Auth::check() ? Auth::user()->role : 'guest';
        return view('layouts.front.cekresi')->with('currentUserRole', $currentUserRole);
    }

    public function getTransaction()
    {
        $transactions = Transaction::orderby('id', 'asc')->select('*')->get();

        // Fetch all records
        $response['data'] = $transactions;

        return response()->json($response);
    }

    public function getTransactionbyKode(Request $request)
    {

        $transactionKode = $request->transactionKode;

        $transactions = Transaction::select('*')
        ->where('kode', 'like', '%' . $transactionKode. '%')
        ->orWhere('nama', 'like', '%' . $transactionKode . '%')
        ->get();

        // Fetch all records
        $response['data'] = $transactions;

        return response()->json($response);
    }
}
