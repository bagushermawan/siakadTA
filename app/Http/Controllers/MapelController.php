<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use Illuminate\Support\Facades\DB;
use Session;

class MapelController extends Controller
{
    public function index()
    {
        $daftar_mapel = Mapel::paginate();
        return view('mapel.index', ['daftar_mapel' => $daftar_mapel]);
    }

    public function create()
    {
        return view('mapel.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'kelompok' => 'required',
        ]);

        $mapel = new Mapel();
        $mapel->nama = $request->nama;

        if (!$mapel->save()) {
            Session::flash('gagal', 'Yamaap, Mapel gagal disimpan!!');
            return redirect()->route('mapel');
        }

        Session::flash('sukses', 'Yeahh, Mapel berhasil disimpan!');
        return redirect()->route('mapel');

        return back()->withErrors(['nama.required', 'Namdde is required']);
    }

    public function edit($id)
    {
        $mapel = Mapel::find($id);
        if (!$mapel) {
            return abort(404);
        }

        $kelompokOptions = ['Kelompok A', 'Kelompok B', 'Muatan Lokal'];

        return view('mapel.edit', compact('mapel', 'kelompokOptions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:191',
            'kelompok' => 'required',
        ]);

        $mapel = Mapel::find($id);
        $mapel->nama = $request->nama;
        $mapel->kelompok = $request->kelompok;
        $mapel->save();
        Session::flash('update', 'Mapel berhasil di update!');
        return redirect()->route('mapel');
    }

    public function destroy($id)
    {
        $mapel = Mapel::find($id);
        $mapel->delete();
        Session::flash('delete', 'Mapel berhasil dihapus!');
        return redirect()->route('mapel');
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $mapel = Mapel::where('nama', 'LIKE', "%$keyword%")->get();
        return $mapel;
    }
}
