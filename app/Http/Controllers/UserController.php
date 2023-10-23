<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function index()
    {
        $allRoles = Role::pluck('nama')->toArray(); //Semua role
        $role = ['guru', 'santri']; // beberapa role

        $daftar_user = User::whereIn('role', $allRoles)->paginate();
        $count = $daftar_user->count();

        return view('user.index', compact('role', 'daftar_user', 'count'));

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
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            // 'tgl_lahir' => 'required',
            'role' => 'required',

        ]);

        $user = new User();
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->alamat = $request->alamat;
        // $user->tgl_lahir = $request->tgl_lahir;
        $user->role = $request->role;

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
        $roles = Role::all();
        if(!$user){
            return abort(404);
        }
        return view('user.edit')->with('user', $user)->with('roles', $roles);
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->nama = $request->get('nama');
        $user->email = $request->get('email');
        if ($request->has('password')) {
            $user->password = bcrypt($request->get('password'));
        }
        $user->alamat = $request->get('alamat');
        // $user->tgl_lahir = $request->get('tgl_lahir');
        // Get the role name based on the selected role ID
        $role = Role::find($request->get('role'));
        if ($role) {
            $user->role = $role->nama;
        } else {
            $user->role = null;
        }

        $user->save();
        Session::flash('update','User berhasil di update!');
        return redirect()->route('user');
    }

    public function destroy($id)
    {
        $user = User::find($id);
            $user->delete();
            Session::flash('delete','User berhasil dihapus!');
            return redirect()->route('user');
    }


}
