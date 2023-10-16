@extends('layouts.master')
@section('title', 'Kelas')
@section('header', 'Kelas')
@section('button-header')
{{-- <div class="section-header-button">
    <a href="features-post-create.html" class="btn btn-primary">Add New</a>
  </div> --}}
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('kelas.update', ['id' => $kelas->id]) }}" method="POST">
                        @csrf
                        {{ method_field('put') }}
                        <div class="form-group">
                            <label>Edit Nama:</label>
                            <input type="text" name="nama" class="form-control" value="{{ $kelas->nama }}">
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Update</button>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
