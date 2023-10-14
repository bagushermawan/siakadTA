@extends('layouts.master')
@section('title', 'Ekskul')
@section('header', 'Ekskul')
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
                        <form id="myForm" action="{{ route('ekskul.update', ['id' => $ekskul->id]) }}" method="POST">
                            @csrf
                            {{ method_field('put') }}
                            <div class="form-group">
                                <label>Edit Ekskul:</label>
                                <input type="text" name="nama" class="form-control" value="{{ $ekskul->nama }}">
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Update</button>
                                <button class="btn btn-secondary" type="reset" value="Reset"
                                    onclick="resetForm()">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
