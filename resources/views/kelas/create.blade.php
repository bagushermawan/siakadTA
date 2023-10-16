@extends('layouts.master')
@section('title', 'Kelas')
@section('header', 'Kelas')
@section('button-header')
@endsection
@section('content')
<div class="section-body">
    <h2 class="section-title">Kelas</h2>
    <p class="section-lead">
        You can manage all kelass, such as editing, deleting and more.
    </p>
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('kelas.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Kelas:</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
