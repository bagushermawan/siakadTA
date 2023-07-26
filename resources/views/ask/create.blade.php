@extends('layouts.master')
@section('title', 'Question')
@section('header', 'Question')
@section('button-header')
@endsection
@section('content')
    <div class="section-body">
        <h2 class="section-title">Ask</h2>
        <p class="section-lead">
            You can manage all blogs/posts, such as editing, deleting and more.
        </p>
        <div class="row">
            <div class="col-12">
                <div class="card" style="width:40%;">
                    <div class="card-body">
                        <form id="myForm" action="{{ route('ask.store') }}" method="POST">
                            @csrf
                            <input type="text" name="tanggal_tanya" style="display:none;" id="tanggal_post"
                                class="form-control" value="{{ now()->format('Y-m-d H:i:s') }}" readonly>
                            <div class="form-group">
                                <label>Judul :</label>
                                {{-- <input type="text" name="judul" class="form-control" required autofocus> --}}
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="judul" value="Tanya Harga" class="selectgroup-input">
                                        <span class="selectgroup-button">Tanya Harga</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="judul" value="Konsul dong" class="selectgroup-input">
                                        <span class="selectgroup-button">Konsultasi</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Isi :</label>
                                <textarea class="form-control" name="isi" style="height: 200px"></textarea>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                <button class="btn btn-secondary" type="reset" value="Reset"
                                    onclick="resetForm()">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
