@extends('layouts.master')
@section('title', 'Transaction')
@section('header', 'Transaction')
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
                          <h4>Transaction Form</h4>
                        </div> --}}
                <div class="card-body">
                    {{-- <div class="alert alert-info">
                            <b>Note!</b> Not all browsers support HTML5 type input.
                          </div> --}}
                    <form action="{{ route('transaction.update', ['id' => $transaction->id]) }}" method="POST">
                        @csrf
                        {{ method_field('put') }}
                        <div class="form-group">
                            <label>Edit Kode:</label>
                            <input type="text" name="kode" disabled class="form-control" value="{{ $transaction->kode }}">
                        </div>
                        <div class="form-group">
                            <label>Edit Nama:</label>
                            <input type="text" name="nama" class="form-control" value="{{ $transaction->nama }}">
                        </div>
                        <div class="form-group">
                            <label>Edit Merek:</label>
                            <input type="text" name="merek" class="form-control" value="{{ $transaction->merek }}">
                        </div>
                        <div class="form-group">
                            <label>Edit Plat Nomer:</label>
                            <input type="text" name="platnomer" class="form-control" value="{{ $transaction->platnomer }}">
                        </div>
                        <div class="form-group">
                            <label>Edit Status:</label>
                            <label class="selectgroup-item">
                                <input type="radio" name="status" value="proses" class="selectgroup-input" checked="">
                                <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-sync"> Proses</i></span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="status" value="selesai" class="selectgroup-input" checked="">
                                <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"> Selesai</i></span>
                            </label>
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