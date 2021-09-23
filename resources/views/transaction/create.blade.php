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
    <h2 class="section-title">Transaction</h2>
    <p class="section-lead">
        You can manage all transactions, such as editing, deleting and more.
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
                    <form action="{{route('transaction.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Transaction:</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Merek:</label>
                            <input type="text" name="merek" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Plat Nomor:</label>
                            <input type="text" name="platnomer" class="form-control plat-no">
                        </div><div class="form-group">
                            <label>Status:</label>
                            <label class="selectgroup-item">
                                <input type="radio" name="status" value="proses" class="selectgroup-input" checked="">
                                <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-sync"> Proses</i></span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="status" value="selesai" class="selectgroup-input">
                                <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"> Selesai</i></span>
                            </label>
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
    @push('page-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
        <script type="text/javascript">
            var cleavePC = new Cleave('.plat-no', {
  delimiter: '-',
  blocks: [1, 4, 2],
  uppercase: true
});
        </script>
    @endpush