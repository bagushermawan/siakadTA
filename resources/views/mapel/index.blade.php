@extends('layouts.master')
@section('title', 'Mapel')
@section('header', 'Mapel')
@section('button-header')
<div class="section-header-button">
    <a href="{{route('mapel.create')}}" class="btn btn-primary">Add New</a>
</div>
@endsection
@section('content')
<div class="section-body">
    <p class="section-title">
        <p class="section-lead">
            You can manage all mapels, such as editing, deleting and more.
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
                                                <th style="width: 10%;">
                                                    <center>No</center>
                                                </th>
                                                <th class="sorting"style="width: 35%;">Nama Mata Pelajaran</th>
                                                <th class="sorting"><center>Kelompok</center></th>
                                                <th style="width: 15%;">
                                                    <center>Created at</center>
                                                </th>
                                                <th style="width: 15%;">
                                                    <center>Updated at</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($daftar_mapel as $no => $mapel)
                                            <tr role="row" class="even">
                                                <td>
                                                    <center>
                                                        {{ $loop->iteration }}
                                                    </center>
                                                </td>
                                                <td>{{ $mapel->nama }}<div class="table-links">
                                                    <a href="{{ route('mapel.edit', ['id'=>$mapel->id])}}">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="{{ route('mapel.destroy', ['id'=>$mapel->id])}}" class="text-danger">Delete</a>
                                                  </div>
                                                </td>
                                                <td>
                                                    <center>
                                                        {{ $mapel->kelompok }}
                                                    </center>
                                                </td>
                                                <td class="text-right">
                                                    <center>
                                                        {{$mapel->created_at->format('d M Y || H:i')}}
                                                    </center>
                                                </td>
                                                <td class="text-right">
                                                    <center>
                                                        {{$mapel->updated_at->format('d M Y || H:i')}}
                                                    </center>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- {{$daftar_mapel->links()}} --}}
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
