@extends('layouts.master')
@section('title', 'Category')
@section('header', 'Category')
@section('button-header')
<div class="section-header-button">
    <a href="{{route('category.create')}}" class="btn btn-primary">Add New</a>
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
                                                <th class="sorting"style="width: 75%;">Name</th>
                                                <th style="width: 15%;">
                                                    <center>Created at</center>
                                                </th>
                                                {{-- <th class="sorting_disabled" rowspan="1" colspan="1"
                                                    aria-label="Members" style="width: 229.562px;">Members</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="table-1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Due Date: activate to sort column ascending"
                                                    aria-sort="descending" style="width: 101.156px;">Due Date</th>
                                                <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1"
                                                    colspan="1" aria-label="Status: activate to sort column ascending"
                                                    style="width: 122.094px;">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1"
                                                    colspan="1" aria-label="Action: activate to sort column ascending"
                                                    style="width: 83.7969px;">Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($daftar_category as $no => $category)
                                            <tr role="row" class="even">
                                                <td>
                                                    <center>
                                                        {{++$no + ($daftar_category->currentPage()-1) * $daftar_category->perPage()}}
                                                    </center>
                                                </td>
                                                <td>{{ $category->nama }}<div class="table-links">
                                                    <a href="{{ route('category.edit', ['id'=>$category->id])}}">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="{{ route('category.destroy', ['id'=>$category->id])}}" class="text-danger">Delete</a>
                                                  </div></td>

                                                <td class="text-right">
                                                    <center>
                                                        {{$category->created_at->format('d M Y, H:i')}}
                                                    </center>
                                                </td>
                                                {{-- <td>
                                                    <img alt="image" src="assets/img/avatar/avatar-2.png"
                                                        class="rounded-circle" width="35" data-toggle="tooltip" title=""
                                                        data-original-title="Rizal Fakhri">
                                                </td>
                                                <td class="sorting_1">2018-01-16</td>
                                                <td>
                                                    <div class="badge badge-success">Completed</div>
                                                </td>
                                                <td><a href="#" class="btn btn-secondary">Detail</a></td> --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- {{$daftar_category->links()}} --}}
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