<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Session;

class CategoryController extends Controller
{
    public function index()
    {
        $daftar_category = Category::paginate();
        return view("category.index", ["daftar_category" => $daftar_category]);
        // return view('category.index');
    }



    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'nama'=>'required',
        ]);

        $category = new Category();
        $category->nama = $request->nama;

    	if(!$category->save()){
            Session::flash('gagal','Yamaap, Category gagal disimpan!!');
            return redirect()->route('category');
        }

        Session::flash('sukses','Yeahh, Category berhasil disimpan!');
        return redirect()->route('category');

        return back()->withErrors(['nama.required', 'Namdde is required']);

    }


    public function edit($id)
    {
        $category = Category::find($id);
        if(!$category){
            return abort(404);
        }
        return view('category.edit')->with('category', $category)->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:191',
        ]);

        $category = Category::find($id);
        $category->nama = $request->nama;
        $category->save();
        Session::flash('update','Category berhasil di update!');
        return redirect()->route('category');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
            $category->delete();
            Session::flash('delete','Category berhasil dihapus!');
            return redirect()->route('category');
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $category = Category::where("nama", "LIKE", "%$keyword%")->get();
        return $category;
    }
}
