@extends('layouts.master')
@section('title', 'Tahun Ajaran')
@section('header', 'Tahun Ajaran')
@section('button-header')
<div class="section-header-button">
    <a href="{{route('tahunajaran.create')}}" class="btn btn-primary">Add New</a>
</div>
@endsection
@section('content')
<div class="section-body">
    <p class="section-title">
        <p class="section-lead">
            You can manage all tahunajarans, such as editing, deleting and more.
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
                                                <th class="sorting"style="width: 35%;">Name</th>
                                                <th style="width: 15%;">
                                                    <center>Created at</center>
                                                </th>
                                                <th style="width: 15%;">
                                                    <center>Updated at</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($daftar_tahunajaran as $no => $tahunajaran)
                                            <tr role="row" class="even">
                                                <td>
                                                    <center>
                                                        {{++$no + ($daftar_tahunajaran->currentPage()-1) * $daftar_tahunajaran->perPage()}}
                                                    </center>
                                                </td>
                                                <td>{{ $tahunajaran->nama }}<div class="table-links">
                                                    <a href="{{ route('tahunajaran.edit', ['id'=>$tahunajaran->id])}}">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="{{ route('tahunajaran.destroy', ['id'=>$tahunajaran->id])}}" class="text-danger">Delete</a>
                                                  </div></td>

                                                <td class="text-right">
                                                    <center>
                                                        {{$tahunajaran->created_at->format('d M Y || H:i')}}
                                                    </center>
                                                </td>
                                                <td class="text-right">
                                                    <center>
                                                        {{$tahunajaran->updated_at->format('d M Y || H:i')}}
                                                    </center>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- {{$daftar_tahunajaran->links()}} --}}
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
