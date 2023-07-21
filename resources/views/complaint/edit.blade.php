@extends('layouts.master')
@section('title', 'Complaint')
@section('header', 'Complaint')
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
                {{-- <div class="card-header">
                          <h4>Complaint Form</h4>
                        </div> --}}
                <div class="card-body">
                    {{-- <div class="alert alert-info">
                            <b>Note!</b> Not all browsers support HTML5 type input.
                          </div> --}}
                    <form id="myForm" action="{{ route('complaint.update', ['id' => $complaint->id]) }}" method="POST">
                        @csrf
                        {{ method_field('put') }}
                        <div class="form-group">
                            <label>Edit Complaint:</label>
                            <input type="text" name="nama" class="form-control" value="{{ $complaint->nama }}">
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Update</button>
                            <button class="btn btn-secondary" type="reset" value="Reset" onclick="resetForm()">Reset</button>                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection