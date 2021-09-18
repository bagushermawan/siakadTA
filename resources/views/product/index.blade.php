@extends('layouts.master')
@section('title', 'Product')
@section('header', 'Product')
@section('button-header')
<div class="section-header-button">
    <a href="{{route('product.create')}}" class="btn btn-primary">Add New</a>
  </div>
@endsection
@section('content')
    <div class="section-body">
        <p class="section-title">
          <p class="section-lead">
              You can manage all products, such as editing, deleting and more.
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
                                                <th style="width: 5%;"><center>No</center></th>
                                                <th class="sorting"style="width: 20%;">Nama</th>
                                                <th class="sorting"style="width: 10%;">Stock</th>
                                                <th class="sorting"style="width: 20%;">Price</th>
                                                <th class="sorting"style="width: 20%;">Category</th>
                                                <th style="width: 15%;"><center>Created at</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($daftar_product as $no => $product)
                                            <tr role="row" class="even">
                                                <td>
                                                    <center>
                                                        {{++$no + ($daftar_product->currentPage()-1) * $daftar_product->perPage()}}
                                                    </center>
                                                </td>
                                                <td>{{ $product->nama }}
                                                  <div class="table-links">
                                                    <a href="{{ route('product.edit', ['id'=>$product->id])}}">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="{{ route('product.destroy', ['id'=>$product->id])}}" class="text-danger">Delete</a>
                                                  </div>
                                                </td>
                                                <td>{{$product->stock}}</td>
                                                <td>Rp {{$product->price}}</td>
                                                <td>
                                                    @foreach($product->category as $c)
                                                    <div class="badge badge-primary">{{ $c->nama }}</div>
                                                    @endforeach
                                                </td>
                                                <td class="text-right"><center>{{$product->created_at->format('d M Y, H:i')}}</center></td>
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