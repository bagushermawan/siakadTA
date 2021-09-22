@extends('layouts.master')
@section('title', 'Transaction')
@section('header', 'Transaction')
@section('button-header')
<div class="section-header-button">
    <a href="{{route('transaction.create')}}" class="btn btn-primary">Add New</a>
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
                                                <th class="sorting"style="width: 20%;">Kode</th>
                                                <th class="sorting"style="width: 10%;">Nama</th>
                                                <th class="sorting"style="width: 10%;">Merek</th>
                                                <th class="sorting"style="width: 10%;">Plat Nomer</th>
                                                <th class="sorting"style="width: 10%;">Status</th>
                                                <th style="width: 15%;">
                                                    <center>Created at</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($daftar_transaction as $no => $transaction)
                                            <tr role="row" class="even">
                                                <td>
                                                    <center>
                                                        {{++$no + ($daftar_transaction->currentPage()-1) * $daftar_transaction->perPage()}}
                                                    </center>
                                                </td>
                                                <td>{{ $transaction->kode }}<div class="table-links">
                                                    <a href="{{ route('transaction.edit', ['id'=>$transaction->id])}}">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="{{ route('transaction.destroy', ['id'=>$transaction->id])}}" class="text-danger">Delete</a>
                                                  </div>
                                                </td>
                                                <td>{{$transaction->nama}}</td>
                                                <td>{{$transaction->merek}}</td>
                                                <td>{{$transaction->platnomer}}</td>
                                                <td>@if($transaction->status=='proses')<div class="badge badge-secondary">Proses</div> @else <div class="badge badge-success">Selesai</div> @endif</td>

                                                <td class="text-right">
                                                    <center>
                                                        {{$transaction->created_at->format('d M Y, H:i')}}
                                                    </center>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- {{$daftar_transaction->links()}} --}}
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