<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AbsenSiswa;

class AbsenSiswaController extends Controller
{
    public function index()
    {
        $daftar_absensiswa = AbsenSiswa::paginate();
        return view('absensiswa.index', ['daftar_absensiswa' => $daftar_absensiswa]);
    }

    public function create()
    {
        return view('absensiswa.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $absensiswa = new AbsenSiswa();
        $absensiswa->nama = $request->nama;

        if (!$absensiswa->save()) {
            Session::flash('gagal', 'Yamaap, AbsenSiswa gagal disimpan!!');
            return redirect()->route('absensiswa');
        }

        Session::flash('sukses', 'Yeahh, AbsenSiswa berhasil disimpan!');
        return redirect()->route('absensiswa');

        return back()->withErrors(['nama.required', 'Namdde is required']);
    }

    public function edit($id)
    {
        $absensiswa = AbsenSiswa::find($id);
        if (!$absensiswa) {
            return abort(404);
        }

        return view('absensiswa.edit')->with('absensiswa', $absensiswa);;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:191',
        ]);

        $absensiswa = AbsenSiswa::find($id);
        $absensiswa->nama = $request->nama;
        $absensiswa->save();
        Session::flash('update', 'AbsenSiswa berhasil di update!');
        return redirect()->route('absensiswa');
    }

    public function destroy($id)
    {
        $absensiswa = AbsenSiswa::find($id);
        $absensiswa->delete();
        Session::flash('delete', 'AbsenSiswa berhasil dihapus!');
        return redirect()->route('absensiswa');
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $absensiswa = AbsenSiswa::where('nama', 'LIKE', "%$keyword%")->get();
        return $absensiswa;
    }
}
