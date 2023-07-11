<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Session;


class TransactionController extends Controller
{
    public function index()
    {
        $daftar_transaction = Transaction::paginate();
        return view("transaction.index", ["daftar_transaction" => $daftar_transaction]);

    }

    public function create()
    {
        return view('transaction.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'nama'=>'required',
            'merek'=>'required',
            'platnomer'=>'required',
            'status'=>'required',
        ]);


        $transaction = new Transaction();
        $transaction->nama = $request->nama;
        $transaction->merek = $request->merek;
        $transaction->platnomer = $request->platnomer;
        $a='AUIEOaiueo';
        $transaction->kode=str_replace(" ", "", $request->nama).substr(str_shuffle($a), 0, 5).str_replace(" ", "", $request->merek);
        $transaction->status=$request->status;

    	if(!$transaction->save()){
            Session::flash('gagal','Yamaap, Transaction gagal disimpan!!');
            return redirect()->route('transaction');
        }

        Session::flash('sukses','Yeahh, Transaction berhasil disimpan!');
        return redirect()->route('transaction');

        return back()->withErrors(['nama.required', 'Nama is required']);

    }


    public function edit($id)
    {
        $transaction = Transaction::find($id);
        if(!$transaction){
            return abort(404);
        }
        return view('transaction.edit')->with('transaction', $transaction)->with('transaction', $transaction);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'merek' => 'required',
            'platnomer' => 'required',
            'status' => 'required',
        ]);

        $transaction = Transaction::find($id);
        $transaction->nama = $request->nama;
        $transaction->merek = $request->merek;
        $transaction->platnomer = $request->platnomer;
        $transaction->status = $request->status;
        $transaction->save();
        Session::flash('update','Transaction berhasil di update!');
        return redirect()->route('transaction');
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);
            $transaction->delete();
            Session::flash('delete','Transaction berhasil dihapus!');
            return redirect()->route('transaction');
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $transaction = Transaction::where("nama", "LIKE", "%$keyword%")->get();
        return $transaction;
    }






    public function tes()
    {
        $a='0123445679abcdefghijklmnopqrstuvwxyzABCDEFGHIFJKLMNOPQRSTUVWXYZ';
        $b='video-'.substr(str_shuffle($a), 0, 16).'.mp4';
        // dd($b);

        // return $kode;
    }

    public function kode()
    {
        $a='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $b='abcdefghijklmnopqrstuvwxyz';

        $kode=mt_rand(1, 1000).$a[rand(0, strlen($a))].mt_rand(1000, 2000).$b[rand(0, strlen($a))];

        $string=str_shuffle($kode);

        $kodeExists=new kodeExists();
        if (kodeExists($number)) {
            return kode();
        }
        return $kode;
    }

    public function kodeExists($kode)
    {
        return Transaction::whereKode($kode)->exists();
    }
}
