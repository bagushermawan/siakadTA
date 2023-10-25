<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAjaran;
use Illuminate\Support\Facades\DB;
use Session;

class TahunAjaranController extends Controller
{
    public function index()
    {
        $daftar_tahunajaran = TahunAjaran::all();
        return view("tahunajaran.index", ["daftar_tahunajaran" => $daftar_tahunajaran]);
    }



    public function create()
    {
        return view('tahunajaran.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tahun_awal' => 'required|numeric',
            'tahun_akhir' => 'required|numeric|gt:tahun_awal', // Memastikan tahun akhir lebih besar dari tahun awal
        ]);

        $tahunajaran = new TahunAjaran();
        $tahunajaran->nama = $request->tahun_awal . '/' . $request->tahun_akhir;

        if (!$tahunajaran->save()) {
            Session::flash('gagal', 'Yamaap, TahunAjaran gagal disimpan!!');
            return redirect()->route('tahunajaran.create');
        }

        Session::flash('sukses', 'Yeahh, TahunAjaran berhasil disimpan!');
        return redirect()->route('tahunajaran');

        return back()->withErrors(['nama.required', 'Namdde is required']);
    }


    public function edit($id)
    {
        $tahunajaran = TahunAjaran::find($id);
        if (!$tahunajaran) {
            return abort(404);
        }

        // Pisahkan tahun awal dan tahun akhir dari 'nama'
        $tahunajaranData = explode('/', $tahunajaran->nama);
        $tahun_awal = $tahunajaranData[0];
        $tahun_akhir = $tahunajaranData[1];

        return view('tahunajaran.edit', compact('tahunajaran', 'tahun_awal', 'tahun_akhir'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun_awal' => 'required|numeric',
            'tahun_akhir' => 'required|numeric|gt:tahun_awal',
        ]);

        $tahunajaran = TahunAjaran::find($id);
        if (!$tahunajaran) {
            return abort(404);
        }

        // Mengambil input dari formulir
        $tahun_awal = $request->tahun_awal;
        $tahun_akhir = $request->tahun_akhir;

        // Menggabungkan tahun awal dan tahun akhir menjadi format tahun ajaran
        $tahunajaran->nama = $tahun_awal . '/' . $tahun_akhir;

        // Simpan perubahan
        $tahunajaran->save();
        Session::flash('update', 'TahunAjaran berhasil di update!');
        return redirect()->route('tahunajaran');
    }

    public function destroy($id)
    {
        $tahunajaran = TahunAjaran::find($id);
        $tahunajaran->delete();
        Session::flash('delete', 'TahunAjaran berhasil dihapus!');
        return redirect()->route('tahunajaran');
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $tahunajaran = TahunAjaran::where("nama", "LIKE", "%$keyword%")->get();
        return $tahunajaran;
    }
}
