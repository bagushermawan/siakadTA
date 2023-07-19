@extends('layouts.master')
@section('title', 'Welcome')
@section('header')
    Welcome <b>{{ Auth::user()->nama }}</b><i>({{ Auth::user()->role }})</i>
@endsection
@section('button-header')
    {{-- <div class="section-header-button">
    <a href="{{route('user.create')}}" class="btn btn-primary">Add New</a>
  </div> --}}
@endsection
@section('content')
    <div class="section-body">
        <p class="section-title">
        <p class="section-lead">
            Disini kamu bisa melihat statistik dari web ini, sebagai berikut ..
        </p>
        </p>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total User</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalUsers }}
                            <div class="text-muted text-small"><a href="{{ route('user') }}">View all</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-user-tag"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Role</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalRoles }}
                            <div class="text-muted text-small"><a href="{{ route('role') }}">View all</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-tags"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Category</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalCategories }}
                            <div class="text-muted text-small"><a href="{{ route('category') }}">View all</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fab fa-product-hunt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Product</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalProducts }}
                            <div class="text-muted text-small"><a href="{{ route('product') }}">View all</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-exclamation"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Complaint</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalComplaints }}
                            <div class="text-muted text-small"><a href="{{ route('complaint') }}">View all</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-cart-arrow-down"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Transaction</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalTransactions }}
                            <div class="text-muted text-small"><a href="{{ route('transaction') }}">View all</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
