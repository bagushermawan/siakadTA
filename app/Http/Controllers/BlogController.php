<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $daftar_blog = Blog::all();

        return view('blog.index', compact('daftar_blog'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'required',
            'nama_user' => 'required',
            'tanggal_post' => 'required',
        ]);

        $gambar = $request->file('gambar')->store('public/gambar');
        $blog = new Blog();
        $blog->judul = $request->judul;
        $blog->isi = $request->isi;
        $blog->gambar = $gambar;
        $blog->nama_user = $request->nama_user; // Mengisi kolom user_id dengan ID pengguna yang saat ini login
        $blog->tanggal_post = now(); // Mengisi kolom tanggal_post dengan waktu saat ini

        if (!$blog->save()) {
            Session::flash('gagal', 'Yamaap, Blog/Post gagal disimpan!!');
            return redirect()->route('blog');
        }

        Session::flash('sukses', 'Yeahh, Blog berhasil disimpan!');
        return redirect()->route('blog');
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            return abort(404);
        }
        return view('blog.edit')->with('blog', $blog)->with('blog', $blog);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->judul = $request->judul;
        $blog->isi = $request->isi;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($blog->gambar && file_exists(storage_path('app/public/' . $blog->gambar))) {
                Storage::delete('public/' . $blog->gambar);
            }

            // Simpan gambar baru
            $gambar = $request->file('gambar')->store('public/gambar');
            $blog->gambar = $gambar;
        }

        $blog->save();

        Session::flash('sukses', 'Blog berhasil diupdate!');
        return redirect()->route('blog');
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        Session::flash('delete', 'blog berhasil dihapus!');
        return redirect()->route('blog');
    }
}
