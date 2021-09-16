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
        // dd($daftar_product->categories->name);

        return view("user.index", ["daftar_user" => $daftar_user], compact('count'));
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
            Session::flash('gagal','Yamaap, Product gagal disimpan!!');
            return redirect()->route('user.create');
        }

        $user = User::findorFail($user->id);
        $user->role()->attach($request->get('role_id'));

        Session::flash('sukses','Yeahh, Product berhasil disimpan!');
        return redirect()->route('user');
    }

    
}
