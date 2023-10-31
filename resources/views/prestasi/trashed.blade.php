@extends('layouts.master')
@section('title', 'Prestasi')
@section('header', 'Prestasi')
@section('button-header')
    <div class="section-header-button">
        {{-- <a href="{{ route('prestasi.create') }}" class="btn btn-primary">Add New</a> --}}
    </div>
@endsection
@section('content')
    <div class="section-body">
        <p class="section-title">
        <p class="section-lead">
            You can manage all categories, such as editing, deleting and more.
        </p>
        </p>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('prestasi') }}" class="btn btn-primary" style="margin-bottom: 10px;">Back</a>
                        <a href="{{ route('prestasi.restoreAll') }}" class="btn btn-info" style="margin-bottom: 10px;">Restore All</a>
                        <a href="{{ route('prestasi.deletePermanentAll') }}" class="btn btn-danger" style="margin-bottom: 10px;">Delete Permanent All</a>
                        <div class="table-responsive">
                            <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped dataTable no-footer" id="table-1" role="grid" aria-describedby="table-1_info">
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <thead>
                                                <tr role="row">
                                                    <th style="width: 5%;">
                                                        <center>No</center>
                                                    </th>
                                                    <th class="sorting">Nama</th>
                                                    <th style="width: 15%;">
                                                        <center>Created at</center>
                                                    </th>
                                                    <th style="width: 15%;">
                                                        <center>Updated at</center>
                                                    </th>
                                                    <th style="width: 15%;">
                                                        <center>Deleted at</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($daftar_prestasi_trashed) > 0)
                                                    @foreach ($daftar_prestasi_trashed as $no => $prestasi)
                                                        <tr role="row" class="even">
                                                            <td>
                                                                <center>
                                                                    {{ $loop->iteration }}
                                                                </center>
                                                            </td>
                                                            <td>{{ $prestasi->nama }}<div class="table-links">
                                                                    <a href="{{ route('prestasi.restore', $prestasi->id) }}">Restore</a>
                                                                    <div class="bullet"></div>
                                                                    <a href="{{ route('prestasi.deletePermanent', $prestasi->id) }}" class="text-danger">Hapus Permanen</a>


                                                                </div>
                                                            </td>
                                                            <td class="text-right">
                                                                <center>
                                                                    {{ $prestasi->created_at->format('d M Y, H:i') }}
                                                                </center>
                                                            </td>
                                                            <td class="text-right">
                                                                <center>
                                                                    {{ $prestasi->updated_at->format('d M Y, H:i') }}
                                                                </center>
                                                            </td>
                                                            <td class="text-right">
                                                                <center>
                                                                    {{ $prestasi->deleted_at->format('d M Y, H:i') }}
                                                                </center>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="7" class="text-center">Tidak ada data.</td>
                                                    </tr>
                                                @endif
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
