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