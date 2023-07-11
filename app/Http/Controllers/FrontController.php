<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class FrontController extends Controller
{
    public function index()
    {
        return view('layouts.front.resi');
    }

    public function resi()
    {
        $resi = Transaction::all();
        // $transactions = Transaction::paginate(10);
        return view('layouts.front.cekresi', compact('resi'));
        // return view('layouts.front.cekresi');
    }

    public function show($id)
    {
        $resi = Transaction::find($id);

        return response()->json($resi);
    }
}
