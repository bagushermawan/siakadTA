@extends('layouts.master')
@section('title', 'Blog')
@section('header', 'Blog')
@section('button-header')
@endsection
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="myForm" action="{{ route('blog.update', ['id' => $blog->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="judul">Edit Judul:</label>
                                <input type="text" name="judul" id="judul" class="form-control"
                                    value="{{ $blog->judul }}">
                            </div>

                            <div class="form-group">
                                <label for="isi">Edit Isi:</label>
                                <textarea name="isi" id="isi" class="form-control" style="height: 200px">{{ $blog->isi }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar:</label>
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Pilih Gambar</label>
                                    <input type="file" name="gambar" id="image-upload">
                                </div>
                                <div class="custom-control">
                                    <div class="text-muted form-text">
                                        biarkan kosong jika tidak ingin mengganti gambar.
                                    </div>
                                    {{-- @if ($blog->gambar)
                                        <div class="form-text">Gambar sebelumnya:</div>
                                        <img src="{{ Storage::url($blog->gambar) }}" alt="Gambar Sebelumnya"
                                            style="max-width: 250px; margin-top: 10px;border-radius:10px;">
                                    @endif --}}
                                    @if (isset($blog->gambar) && filter_var($blog->gambar, FILTER_VALIDATE_URL))
                                        <!-- Tampilkan gambar jika URL gambar valid -->
                                        <img src="{{ $blog->gambar }}" alt="Gambar Blog"
                                            style="max-width: 250px; margin-top: 10px;border-radius:10px;">
                                    @else
                                        <!-- Tampilkan gambar default jika URL gambar tidak valid atau kosong -->
                                        <img src="{{ Storage::url($blog->gambar) }}" alt="Gambar Default"
                                            style="max-width: 250px; margin-top: 10px;border-radius:10px;">
                                    @endif
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('blog') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('page-script')
        <script src="https://demo.getstisla.com/assets/js/page/features-post-create.js"></script>
        <script>
            function showPreview(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image-label').text('Gambar Terpilih');
                        $('#image-preview img').attr('src', e.target.result);
                        $('#image-preview').show();
                        $('.custom-control').hide();
                    }

                    reader.readAsDataURL(input.files[0]);
                } else {
                    $('#image-label').text('Pilih Gambar');
                    $('#image-preview img').attr('src', '');
                    $('#image-preview').hide();
                    $('.custom-control .form-text').show();
                }
            }

            $("#image-upload").change(function() {
                showPreview(this);
            });
        </script>
    @endpush
