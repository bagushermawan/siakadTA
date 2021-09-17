<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use Illuminate\Support\Facades\DB;
use Session;

class ComplaintController extends Controller
{
    public function index()
    {
        $daftar_complaint = Complaint::paginate();
        return view("complaint.index", ["daftar_complaint" => $daftar_complaint]);
        // return view('complaint.index');
    }

    public function create()
    {
        return view('complaint.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'nama'=>'required',
        ]);

        $complaint = new Complaint();
        $complaint->nama = $request->nama;

    	if(!$complaint->save()){
            Session::flash('gagal','Yamaap, Complaint gagal disimpan!!');
            return redirect()->route('complaint');
        }

        Session::flash('sukses','Yeahh, Complaint berhasil disimpan!');
        return redirect()->route('complaint');

        return back()->withErrors(['nama.required', 'Namdde is required']);

    }


    public function edit($id)
    {
        $complaint = Complaint::find($id);
        if(!$complaint){
            return abort(404);
        }
        return view('complaint.edit')->with('complaint', $complaint)->with('complaint', $complaint);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:191',
        ]);

        $complaint = Complaint::find($id);
        $complaint->nama = $request->nama;
        $complaint->save();
        Session::flash('sukses','Complaint berhasil di update!');
        return redirect()->route('complaint');
    }

    public function destroy($id)
    {
        $complaint = Complaint::find($id);
            $complaint->delete();
            Session::flash('delete','Complaint berhasil dihapus!');
            return redirect()->route('complaint');
    }
    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $complaints = Complaint::where("nama", "LIKE", "%$keyword%")->get();
        return $complaints;
    }
}
