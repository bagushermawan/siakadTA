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
        // $resi = Transaction::all();
        // $transactions = Transaction::paginate(10);
        // return view('layouts.front.cekresi', compact('resi'));
        return view('layouts.front.cekresi');
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

        $transactions = Transaction::select('*')->where('kode', 'like', '%' . $transactionKode. '%')->get();

        // Fetch all records
        $response['data'] = $transactions;

        return response()->json($response);
    }
}
