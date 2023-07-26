<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ask;
use Session;

class AskController extends Controller
{
    public function index()
    {
        $daftar_ask = Ask::all();

        return view('ask.index', compact('daftar_ask'));
    }

    public function create()
    {
        return view('ask.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
            'tanggal_tanya' => 'required',
        ]);

        // Buat instance dari model Blog
        $a = new Ask();
        $a->judul = $request->judul;
        $a->isi = $request->isi;
        $a->tanggal_tanya = now();

        // Simpan data blog ke database
        if (!$a->save()) {
            Session::flash('gagal', 'Yamaap, pertanyaan gagal disimpan!!');
            return redirect()->route('ask.create');
        }

        Session::flash('sukses', 'Yeahh, Pertanyaan berhasil disimpan!');
        return redirect()->route('ask');
    }

    public function destroy($id)
    {
        $a = Ask::find($id);
        $a->delete();
        Session::flash('delete', 'Question berhasil dihapus!');
        return redirect()->route('ask');
    }
}
