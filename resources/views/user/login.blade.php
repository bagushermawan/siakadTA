@extends('layouts.master-login')
@section('title', 'Login Page')
@section('content')
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                {{-- @if (session('error'))
                    <div class="alert alert-danger">
                        <b>Waduh!</b> {{ session('error') }}
                    </div>
                @endif --}}
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="assets/logo.png" alt="logo" class="" style="width:20rem;">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('actionlogin') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        {{-- <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus> --}}
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control" placeholder="Emailmuu" required="">
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        {{-- <input id="password" type="password" class="form-control" name="password" tabindex="2" required> --}}
                                        <input type="password" name="password" class="form-control" placeholder="Password"
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="simple-footer">
                            Copyright &copy; Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
