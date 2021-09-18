<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Session;


class UserController extends Controller
{
    public function index()
    {
        $role=Role::all();
        $daftar_user = User::paginate();
        $count = User::count();
        // dd($daftar_user->role->nama);

        // return view("user.index", ["daftar_user" => $daftar_user], compact('count'));
        return view('user.index', compact('role', 'daftar_user',));

    }

    public function create()
    {
    	$role = Role::all();

        return view('user.create', [
        	'role' => $role,
        ]);
    }

    public function store (Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'role_id' => 'required',

        ]);

        $user = new User();
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->alamat = $request->alamat;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->role_id = $request->role_id;

        if(!$user->save()){
            Session::flash('gagal','Yamaap, User gagal disimpan!!');
            return redirect()->route('user.create');
        }

        // $role = Role::findorFail($user->id);
        // $user->role()->save($request->get('role_id'));

        Session::flash('sukses','Yeahh, User berhasil disimpan!');
        return redirect()->route('user');
    }

    public function edit($id)
    {
        $user = User::find($id);
        if(!$user){
            return abort(404);
        }
        return view('user.edit')->with('user', $user)->with('user', $user);
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->nama = $request->get('nama');
        $user->username = $request->get('username');
        $user->password = $request->get('password');
        $user->alamat = $request->get('alamat');
        $user->tgl_lahir = $request->get('tgl_lahir');
        $user->role_id = $request->get('role_id');

        $user->save();
        // $user->categories()->sync($request->get('category_id'));
        Session::flash('update','User berhasil di update!');
        return redirect()->route('user');


    }

    public function destroy($id)
    {
        $user = User::find($id);
            $user->delete();
            Session::flash('delete','Category berhasil dihapus!');
            return redirect()->route('user');
    }

    
}
