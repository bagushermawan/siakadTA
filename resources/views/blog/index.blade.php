@extends('layouts.master')
@section('title', 'Blog')
@section('header', 'Blog')
@section('button-header')
    <div class="section-header-button">
        <a href="{{ route('blog.create') }}" class="btn btn-primary">Add New</a>
    </div>
@endsection
@push('page-css')
    <style>
        /* Gaya khusus untuk tag <p> di dalam isi blog */
        td p {
            margin: 0;
            /* Hilangkan margin pada paragraf */
            padding: 0;
            /* Hilangkan padding pada paragraf */
            text-align: justify;
            /* Ratakan teks ke kiri dan kanan */
        }
    </style>
@endpush
@section('content')
    <div class="section-body">
        <p class="section-title">
        <p class="section-lead">
            You can manage all roles, such as editing, deleting and more.
        </p>
        </p>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped dataTable no-footer" id="table-1" role="grid"
                                            aria-describedby="table-1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>
                                                        <center>No</center>
                                                    </th>
                                                    <th class="sorting">Creator</th>
                                                    <th class="sorting">Judul</th>
                                                    <th>Isi</th>
                                                    <th>Gambar</th>
                                                    <th>Created at</th>
                                                    <th style="width:7%;"><center>Action</center></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($daftar_blog as $no => $a)
                                                    <tr role="row" class="even">
                                                        <td>
                                                            <center>
                                                                {{ $loop->iteration }}
                                                            </center>
                                                        </td>
                                                        <td>{{ $a->nama_user }}</td>
                                                        <td>{{ $a->judul }}</td>
                                                        <td>
                                                            <div id="blog_{{ $a->id }}">
                                                                <span
                                                                    id="short_{{ $a->id }}">{!! Str::limit($a->isi, 500) !!}</span>
                                                                <span id="full_{{ $a->id }}"
                                                                    style="display: none;">{!! $a->isi !!}</span>
                                                                @if (strlen($a->isi) > 500)
                                                                    <a href="javascript:void(0)"
                                                                        id="read-more-link_{{ $a->id }}"
                                                                        onclick="toggleReadMore(event, {{ $a->id }})">Lihat
                                                                        Selengkapnya</a>
                                                                    <a href="javascript:void(0)"
                                                                        id="read-less-link_{{ $a->id }}"
                                                                        style="display: none;"
                                                                        onclick="toggleReadLess(event, {{ $a->id }})">Tutup</a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if (isset($a->gambar) && filter_var($a->gambar, FILTER_VALIDATE_URL))
                                                                <!-- Tampilkan gambar jika URL gambar valid -->
                                                                <img src="{{ $a->gambar }}" alt="Gambar Blog"
                                                                    style="width: 100px;">
                                                            @else
                                                                <!-- Tampilkan gambar default jika URL gambar tidak valid atau kosong -->
                                                                <img src="{{ Storage::url($a->gambar) }}"
                                                                    alt="Gambar Default" style="width: 100px;">
                                                            @endif
                                                        </td>
                                                        <td>{{ $a->created_at->format('j F Y, h:i A') }}</td>
                                                        <td ><center>
                                                            <a href="{{ route('blog.edit', ['id' => $a->id]) }}"
                                                                class="btn btn-info"><i class="fas fa-edit" style="width: 10px;"></i></a>
                                                            <a href="{{ route('blog.destroy', ['id' => $a->id]) }}"
                                                                class="btn btn-danger"><i class="fas fa-times" style="width: 10px;"></i></a>
                                                                </center>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page-script')
    <script>
        function toggleReadMore(event, id) {
            event.preventDefault();
            var fullText = document.getElementById('full_' + id);
            var shortText = document.getElementById('short_' + id);
            var readMoreLink = document.getElementById('read-more-link_' + id);
            var readLessLink = document.getElementById('read-less-link_' + id);

            shortText.style.display = 'none';
            fullText.style.display = 'inline';
            readMoreLink.style.display = 'none';
            readLessLink.style.display = 'inline';
        }

        function toggleReadLess(event, id) {
            event.preventDefault();
            var fullText = document.getElementById('full_' + id);
            var shortText = document.getElementById('short_' + id);
            var readMoreLink = document.getElementById('read-more-link_' + id);
            var readLessLink = document.getElementById('read-less-link_' + id);

            shortText.style.display = 'inline';
            fullText.style.display = 'none';
            readMoreLink.style.display = 'inline';
            readLessLink.style.display = 'none';
        }

        // Fungsi untuk menyembunyikan semua tautan "Tutup" pada saat halaman dimuat
        window.onload = function() {
            var readLessLinks = document.querySelectorAll('[id^="read-less-link_"]');
            for (var i = 0; i < readLessLinks.length; i++) {
                readLessLinks[i].style.display = 'none';
            }
        };
    </script>
@endpush
