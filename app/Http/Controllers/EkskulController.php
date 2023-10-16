<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekskul;
use Illuminate\Support\Facades\DB;
use Session;

class EkskulController extends Controller
{
    public function index()
    {
        $daftar_ekskul = Ekskul::paginate();
        return view("ekskul.index", ["daftar_ekskul" => $daftar_ekskul]);
    }



    public function create()
    {
        return view('ekskul.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $ekskul = new Ekskul();
        $ekskul->nama = $request->nama;

        if (!$ekskul->save()) {
            Session::flash('gagal', 'Yamaap, Ekskul gagal disimpan!!');
            return redirect()->route('ekskul');
        }

        Session::flash('sukses', 'Yeahh, Ekskul berhasil disimpan!');
        return redirect()->route('ekskul');

        return back()->withErrors(['nama.required', 'Namdde is required']);
    }


    public function edit($id)
    {
        $ekskul = Ekskul::find($id);
        if (!$ekskul) {
            return abort(404);
        }
        return view('ekskul.edit')->with('ekskul', $ekskul);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:191',
        ]);

        $ekskul = Ekskul::find($id);
        $ekskul->nama = $request->nama;
        $ekskul->save();
        Session::flash('update', 'Ekskul berhasil di update!');
        return redirect()->route('ekskul');
    }

    public function destroy($id)
    {
        $ekskul = Ekskul::find($id);
        $ekskul->delete();
        Session::flash('delete', 'Ekskul berhasil dihapus!');
        return redirect()->route('ekskul');
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $ekskul = Ekskul::where("nama", "LIKE", "%$keyword%")->get();
        return $ekskul;
    }
}
