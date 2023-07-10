<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Session;


class ProductController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $daftar_product = Product::paginate();
        $count = Product::count();
        // dd($daftar_product->category->nama);

        // return view("product.index", ["daftar_product" => $daftar_product], compact('count'));
        return view('product.index', compact('category', 'daftar_product',));
    }

    public function create()
    {
        $category = Category::all();

        return view('product.create', [
            'category' => $category,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'category_id' => 'required',

        ]);

        $product = new Product();
        $product->nama = $request->nama;
        $product->stock = $request->stock;
        $product->price = $request->price;

        if (!$product->save()) {
            Session::flash('gagal', 'Yamaap, Product gagal disimpan!!');
            return redirect()->route('product.create');
        }

        $product = Product::findorFail($product->id);
        $product->category()->attach($request->get('category_id'));
        $product->category()->attach($request->get('product_id'));

        Session::flash('sukses', 'Yeahh, Product berhasil disimpan!');
        return redirect()->route('product');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return abort(404);
        }
        return view('product.edit')->with('product', $product)->with('product', $product);
    }


    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->nama = $request->get('nama');
        $product->stock = $request->get('stock');
        $product->price = $request->get('price');
        // $product->category_id = $request->get('category_id');

        $product->save();
        // $product->categories()->sync($request->get('category_id'));
        $product->category()->sync($request->get('category_id'));
        Session::flash('update', 'Product berhasil di update!');
        return redirect()->route('product');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        Session::flash('delete', 'Category berhasil dihapus!');
        return redirect()->route('product');
    }
}
