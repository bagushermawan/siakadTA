@extends('layouts.master')
@section('title', 'Tahun Ajaran')
@section('header', 'Tahun Ajaran')
@section('button-header')
{{-- <div class="section-header-button">
    <a href="features-post-create.html" class="btn btn-primary">Add New</a>
  </div> --}}
@endsection
@section('content')
<div class="section-body">
    <h2 class="section-title">TahunAjaran</h2>
    <p class="section-lead">
        You can manage all Tahun Ajaran, such as editing, deleting and more.
    </p>
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                {{-- <div class="card-header">
                          <h4>Role Form</h4>
                        </div> --}}
                <div class="card-body">
                    {{-- <div class="alert alert-info">
                            <b>Note!</b> Not all browsers support HTML5 type input.
                          </div> --}}
                    <form action="{{route('tahunajaran.store')}}" method="POST" id="myForm">
                        @csrf
                        <div class="form-group">
                                <label for="tahun_ajaran">Tahun Ajaran</label>
                                <div class="input-group">
                                    <div class="col-1">
                                        <input type="number" name="tahun_awal" class="form-control">
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"
                                            style="background-color: #fff;border: 0px;color: black;font-size: x-large;">/</span>
                                    </div>
                                    <div class="col-1">
                                    <input type="number" name="tahun_akhir" class="form-control">
                                    </div>
                                </div>
                            </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                            <button class="btn btn-secondary" type="reset" value="Reset" onclick="resetForm()">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
