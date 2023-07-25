@extends('layouts.master')
@section('title', 'Blog')
@section('header', 'Blog')
@section('button-header')
@endsection
@section('content')
    <div class="section-body">
        <h2 class="section-title">Blog</h2>
        <p class="section-lead">
            You can manage all blogs/posts, such as editing, deleting and more.
        </p>
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="myForm" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="nama_user" style="display:none;" id="nama_user" class="form-control"
                                value="{{ auth()->user()->nama }}" readonly>
                            <input type="text" name="tanggal_post" style="display:none;" id="tanggal_post"
                                class="form-control" value="{{ now()->format('Y-m-d H:i:s') }}" readonly>

                            <div class="form-group">
                                <label>Judul :</label>
                                <input type="text" name="judul" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Isi :</label>
                                <textarea class="form-control" name="isi" style="height: 200px"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar:</label>
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Pilih Gambar</label>
                                    <input type="file" name="gambar" id="image-upload">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                <button class="btn btn-secondary" type="reset" value="Reset"
                                    onclick="resetForm()">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('page-script')
        <script src="https://demo.getstisla.com/assets/js/page/features-post-create.js"></script>
    @endpush
