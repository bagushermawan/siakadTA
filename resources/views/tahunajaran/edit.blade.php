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
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="myForm" action="{{ route('tahunajaran.update', ['id' => $tahunajaran->id]) }}"
                            method="POST">
                            @csrf
                            {{ method_field('put') }}
                            <div class="form-group">
                                <label for="tahun_ajaran">Tahun Ajaran</label>
                                <div class="input-group">
                                    <input type="number" name="tahun_awal" class="form-control"
                                        value="{{ $tahun_awal }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color: #fff;border: 0px;color: black;font-size: x-large;">/</span>
                                    </div>
                                    <input type="number" name="tahun_akhir" class="form-control"
                                        value="{{ $tahun_akhir }}">
                                </div>
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
