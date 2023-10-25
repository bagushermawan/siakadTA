<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasi;
use Illuminate\Support\Facades\DB;
use Session;

class PrestasiController extends Controller
{
    public function index()
    {
        $daftar_prestasi = Prestasi::all();
        return view('prestasi.index', ['daftar_prestasi' => $daftar_prestasi]);
    }

    public function create()
    {
        return view('prestasi.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $prestasi = new Prestasi();
        $prestasi->nama = $request->nama;

        if (!$prestasi->save()) {
            Session::flash('gagal', 'Yamaap, Prestasi gagal disimpan!!');
            return redirect()->route('prestasi');
        }

        Session::flash('sukses', 'Yeahh, Prestasi berhasil disimpan!');
        return redirect()->route('prestasi');

        return back()->withErrors(['nama.required', 'Namdde is required']);
    }

    public function edit($id)
    {
        $prestasi = Prestasi::find($id);
        if (!$prestasi) {
            return abort(404);
        }

        return view('prestasi.edit')->with('prestasi', $prestasi);;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:191',
        ]);

        $prestasi = Prestasi::find($id);
        $prestasi->nama = $request->nama;
        $prestasi->save();
        Session::flash('update', 'Prestasi berhasil di update!');
        return redirect()->route('prestasi');
    }

    public function destroy($id)
    {
        $prestasi = Prestasi::find($id);
        $prestasi->delete();
        Session::flash('delete', 'Prestasi berhasil dihapus!');
        return redirect()->route('prestasi');
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $prestasi = Prestasi::where('nama', 'LIKE', "%$keyword%")->get();
        return $prestasi;
    }
}
