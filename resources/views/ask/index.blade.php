@extends('layouts.master')
@section('title', 'Question')
@section('header', 'Question')
@section('button-header')
    <div class="section-header-button">
        <a href="{{ route('ask.create') }}" class="btn btn-primary">Add New</a>
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
            You can manage all question, such as editing, deleting and more.
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
                                                    <th class="sorting">Judul</th>
                                                    <th style="width:50%;">Isi</th>
                                                    <th>Created at</th>
                                                    <th style="width:7%;">
                                                        <center>Action</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($daftar_ask as $no => $a)
                                                    <tr role="row" class="even">
                                                        <td>
                                                            <center>
                                                                {{ $loop->iteration }}
                                                            </center>
                                                        </td>
                                                        <td>{{ $a->judul }}</td>
                                                        <td>{{ $a->isi }}</td>
                                                        <td>{{ $a->tanggal_tanya->format('j F Y, h:i A') }}</td>
                                                        <td>
                                                            <center>
                                                                <a href="{{ route('ask.edit', ['id' => $a->id]) }}"
                                                                    class="btn btn-info"><i class="fas fa-edit"
                                                                        style="width: 10px;"></i></a>
                                                                <a href="{{ route('ask.destroy', ['id' => $a->id]) }}"
                                                                    class="btn btn-danger"><i class="fas fa-times"
                                                                        style="width: 10px;"></i></a>
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
