@extends('layouts.master')
@section('title', 'Welcome')
@section('header')
    Welcome <b>
    {{ Auth::user()->nama }}</b><i>({{ Auth::user()->role }})</i>@endsection
@section('button-header')
@endsection
@push('page-css')
    <style>
        .owl-carousel .owl-item img {
            height: 8rem;
        }

        .owl-carousel,
        .owl-carousel .owl-item {
            text-align: center;
            margin-top: 10px;
        }

        .owl-dots .owl-dot span {
            text-align: center;
            width: 10px;
            height: 10px;
            margin: 5px 7px;
            background: #D6D6D6;
            display: block;
            -webkit-backface-visibility: visible;
            transition: opacity .2s ease;
            border-radius: 30px;
        }

        .owl-dots .owl-dot.active span,
        .owl-theme .owl-dots .owl-dot:hover span {
            background: #869791;
        }
    </style>
@endpush
@section('content')
    <div class="section-body">
        <p class="section-title">
        <p class="section-lead">
            Disini kamu bisa melihat statistik dari web ini, sebagai berikut ..
        </p>
        </p>
        <div class="row">
            {{-- Owl User --}}
            <div class="col-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h4>Users <b>({{ $totalUsers }})</b></h4>
                        <div class="card-header-action">
                            <a href="{{ route('user') }}" class="btn btn-info btn-icon icon-right">View All <i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="user-carousel" class="owl-carousel">
                            @foreach ($users as $key => $user)
                                @php
                                    // Mendapatkan nomor avatar berdasarkan indeks $key
                                    $avatarNumber = ($key % 5) + 1;
                                @endphp

                                <div class="item">
                                    <img alt="image" src="assets/img/avatar/avatar-{{ $avatarNumber }}.png"
                                        class="img-fluid"
                                        style="border-radius: 50%;padding-left: 20px;padding-right: 20px;">
                                    <div class="user-details" style="text-align: center;margin-top:10px;">
                                        <div class="user-name"
                                            style="font-weight: 600;color: #191d21;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                            <b>{{ $user->nama }}</b>
                                        </div>
                                        <div class="text-job text-muted"
                                            style="font-size: 10px;text-transform: uppercase;letter-spacing: 1px;font-weight: 700;color: #34395e;">
                                            {{ $user->email }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- Owl Role --}}
            <div class="col-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h4>Roles <b>({{ $totalRoles }})</b></h4>
                        <div class="card-header-action">
                            <a href="{{ route('user') }}" class="btn btn-info btn-icon icon-right">View All <i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="role-carousel" class="owl-carousel">
                            @foreach ($roles as $key => $role)
                                @php
                                    // Mendapatkan nomor avatar berdasarkan indeks $key
                                    $avatarNumber = ($key % 5) + 1;
                                @endphp

                                <div class="item">
                                    <img alt="image" src="assets/img/avatar/avatar-{{ $avatarNumber }}.png"
                                        class="img-fluid"
                                        style="border-radius: 50%;padding-left: 20px;padding-right: 20px;">
                                    <div class="user-details" style="text-align: center;margin-top:10px;">
                                        <div class="user-name"
                                            style="font-weight: 600;color: #191d21;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                            <b>{{ $role->nama }}</b>
                                        </div>
                                        <div class="text-job text-muted"
                                            style="font-size: 10px;text-transform: uppercase;letter-spacing: 1px;font-weight: 700;color: #34395e;">
                                            {{ $role->created_at }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
        <div class="col-4">
        <div class="card card-statistic-1">
            <div class="card-icon bg-secondary">
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
        <div class="col-4">
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
        <div class="col-4">
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
        <div class="col-4">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
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
        <div class="col-4">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
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
        <div class="col-4">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fab fa-product-hunt"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Tanya</h4>
                </div>
                <div class="card-body">
                    {{ $totalProducts }}
                    <div class="text-muted text-small"><a href="{{ route('product') }}">View all</a></div>
                </div>
            </div>
        </div>
        </div>
    </div> --}}
    @endsection
    @push('page-script')
        <script>
            $(document).ready(function() {
                $("#user-carousel").owlCarousel({
                    loop: true,
                    items: {{ count($users) }},
                    margin: 20,
                    responsiveClass: true,
                    autoplay: true,
                    autoplayTimeout: 1400,
                    dots: true,
                    autoplayHoverPause: true,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        600: {
                            items: 3,
                        },
                        1000: {
                            items: 4,
                            loop: true,
                        }
                    },
                });
            });
            $(document).ready(function() {
                $("#role-carousel").owlCarousel({
                    loop: true,
                    items: {{ count($roles) }},
                    margin: 20,
                    responsiveClass: true,
                    autoplay: true,
                    autoplayTimeout: 1600,
                    dots: true,
                    autoplayHoverPause: true,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        600: {
                            items: 2,
                        },
                        1000: {
                            items: 3,
                            loop: true,
                        }
                    },
                });
            });
        </script>
    @endpush
