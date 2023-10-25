<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;
use Session;

class KelasController extends Controller
{
    public function index()
    {
        $daftar_kelas = Kelas::all();
        return view('kelas.index', ['daftar_kelas' => $daftar_kelas]);
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $kelas = new Kelas();
        $kelas->nama = $request->nama;

        if (!$kelas->save()) {
            Session::flash('gagal', 'Yamaap, Kelas gagal disimpan!!');
            return redirect()->route('kelas');
        }

        Session::flash('sukses', 'Yeahh, Kelas berhasil disimpan!');
        return redirect()->route('kelas');

        return back()->withErrors(['nama.required', 'Namdde is required']);
    }

    public function edit($id)
    {
        $kelas = Kelas::find($id);
        if (!$kelas) {
            return abort(404);
        }

        return view('kelas.edit')->with('kelas', $kelas);;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:191',
        ]);

        $kelas = Kelas::find($id);
        $kelas->nama = $request->nama;
        $kelas->save();
        Session::flash('update', 'Kelas berhasil di update!');
        return redirect()->route('kelas');
    }

    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        Session::flash('delete', 'Kelas berhasil dihapus!');
        return redirect()->route('kelas');
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $kelas = Kelas::where('nama', 'LIKE', "%$keyword%")->get();
        return $kelas;
    }
}
