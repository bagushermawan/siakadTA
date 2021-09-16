@extends('layouts.master')
@section('title', 'User')
@section('header', 'User')
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
                    <form action="{{route('user.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama:</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Username:</label>
                          <input type="text" name="username" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Password:</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Alamat:</label>
                      <input type="text" name="alamat" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Lahir:</label>
                    <input type="date" name="tgl_lahir" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Role:</label>
                    <select name="role_id" class="roles" class="form-control">
                      <select class="form-control roles">
                    </select>
                    {{-- select2 mannual no ajax --}}
                    {{-- <select class="form-control select2">
                      @foreach ($role as $r)
                          <option value="{{$r->id}}">{{$r->nama}}</option>
                      @endforeach
                    </select> --}}
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
    <script type="text/javascript">
      $(function(){
      $('.roles').select2({
        placeholder: 'Select Role',
        ajax: {
          url: "{{route('role.ajaxsearch')}}",
          dataType: 'json',
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                return {
                  text: item.nama,
                  id: item.id
                }
              })
            };
          },
          cache: true
        }
      });
    })
    </script>
    @endpush