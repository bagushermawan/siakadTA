@extends('layouts.master')
@section('title', 'Mapel')
@section('header', 'Mapel')
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
                          <h4>Role Form</h4>
                        </div> --}}
                    <div class="card-body">
                        {{-- <div class="alert alert-info">
                            <b>Note!</b> Not all browsers support HTML5 type input.
                          </div> --}}
                        <form id="myForm" action="{{ route('mapel.update', ['id' => $mapel->id]) }}" method="POST">
                            @csrf
                            {{ method_field('put') }}
                            <div class="form-group">
                                <label>Edit Mata Pelajaran:</label>
                                <input type="text" name="nama" class="form-control" value="{{ $mapel->nama }}">
                            </div>
                            <div class="form-group">
    <label for="kelompok">Edit Kelompok:</label>
    <select name="kelompok" id="selectKelompok" class="form-control">
        @foreach ($kelompokOptions as $kelompokOption)
            <option value="{{ $kelompokOption }}">{{ $kelompokOption }}</option>
        @endforeach
    </select>
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
@push('page-script')
    <script>
    $(document).ready(function() {
        // Inisialisasi Select2
        $('#selectKelompok').select2();

        // Set nilai awal berdasarkan data yang sudah ada
        $('#selectKelompok').val("{{ $mapel->kelompok }}").trigger('change');
    });
</script>
@endpush
