<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Session;


class RoleController extends Controller
{
    public function index()
    {
        $daftar_role = Role::paginate();
        return view("role.index", ["daftar_role" => $daftar_role]);
        // return view('role.index');
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'nama'=>'required',
        ]);

        $role = new Role();
        $role->nama = $request->nama;

    	if(!$role->save()){
            Session::flash('gagal','Yamaap, Role gagal disimpan!!');
            return redirect()->route('role');
        }

        Session::flash('sukses','Yeahh, Role berhasil disimpan!');
        return redirect()->route('role');

        return back()->withErrors(['nama.required', 'Namdde is required']);

    }


    public function edit($id)
    {
        $role = Role::find($id);
        if(!$role){
            return abort(404);
        }
        return view('role.edit')->with('role', $role)->with('role', $role);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:191',
        ]);

        $role = Role::find($id);
        $role->nama = $request->nama;
        $role->save();
        Session::flash('sukses','Role berhasil di update!');
        return redirect()->route('role');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
            $role->delete();
            Session::flash('delete','Role berhasil dihapus!');
            return redirect()->route('role');
    }
    public function ajaxSearch(Request $request)
    {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data =Role::select("id","nama")
            		->where('nama','LIKE',"%$search%")
            		->get();
        }
        return response()->json($data);
    }

}
