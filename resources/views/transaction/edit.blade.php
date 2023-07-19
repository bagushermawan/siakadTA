@extends('layouts.master')
@section('title', 'Transaction')
@section('header', 'Transaction')
@section('button-header')
{{-- <div class="section-header-button">
    <a href="features-post-create.html" class="btn btn-primary">Add New</a>
  </div> --}}
@endsection
@push('page-css')
<style>
  .selectgroup-input:checked + .selectgroup-button.selesai {
    background-color: #28a745;
    color: white;
  }
  .selectgroup-input:checked + .selectgroup-button.selesai {
  background-color: #28a745;
  color: #fff;
  z-index: 1; }
</style>
@endpush
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
                            <input type="text" name="platnomer" class="form-control plat-no" value="{{ $transaction->platnomer }}">
                        </div>
                        <div class="form-group">
                            <label>Edit Status:</label>
                            <label class="selectgroup-item">
                                <input type="radio" name="status" value="Proses" class="selectgroup-input" {{ $transaction->status == 'Proses' ? 'checked' : '' }}>
                                <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-sync"> Proses</i></span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="status" value="Selesai" class="selectgroup-input" {{ $transaction->status == 'Selesai' ? 'checked' : '' }}>
                                <span class="selectgroup-button selectgroup-button-icon selesai"><i class="fas fa-check"> Selesai</i></span>
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
