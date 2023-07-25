<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',
            'nama_user' => 'required',
            'tanggal_post' => 'required',
        ]);

        // Mengambil file gambar dari request
        $image = $request->file('gambar');

        // Resize gambar menjadi ukuran yang diinginkan, contoh 400x300 pixels
        $resizedImage = Image::make($image)->fit(400, 300);

        // Mendapatkan ekstensi dari file gambar
        $extension = $image->getClientOriginalExtension();

        // Menamai gambar baru dengan timestamp dan ekstensi yang sama
        $imageName = time() . '.' . $extension;

        // Simpan gambar yang sudah diresize ke direktori storage/app/public/gambar
        Storage::disk('public')->put('gambar/' . $imageName, $resizedImage->stream());
        // Buat instance dari model Blog
        $blog = new Blog();
        $blog->judul = $request->judul;
        $blog->isi = $request->isi;
        $blog->gambar = 'gambar/' . $imageName; // Simpan path gambar ke dalam database
        $blog->nama_user = $request->nama_user;
        $blog->tanggal_post = now();

        // Simpan data blog ke database
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

    public function deleteSelectedBlogs(Request $request)
    {
        $selectedIds = $request->input('ids');
        Blog::whereIn('id', $selectedIds)->delete();

        return response()->json(['message' => 'success']);
    }
}
