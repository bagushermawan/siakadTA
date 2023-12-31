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
                        <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            {{ method_field('put') }}
                            <div class="form-group">
                                <label>Edit Nama:</label>
                                <input type="text" name="nama" class="form-control" value="{{ $user->nama }}">
                            </div>
                            <div class="form-group">
                                <label>Edit Email:</label>
                                <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label>Edit Password:</label>
                                <input type="password" name="password" class="form-control" placeholder="leave blank if you don't want to change it">
                            </div>
                            <div class="form-group">
                                <label>Edit Alamat:</label>
                                <input type="text" name="alamat" class="form-control" value="{{ $user->alamat }}">
                            </div>
                            <div class="form-group">
                                <label>Edit Role:</label>
                                <select id="role" class="form-control roles @error('role') is-invalid @enderror"
                                    name="role" required>
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ $user->role === $role->nama ? 'selected' : '' }}>{{ $role->nama }}</option>
                                    @endforeach {{-- <select class="form-control roles"> --}}
                                </select>
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
        <script type="text/javascript">
            $(function() {
                $('.roles').select2({
                    placeholder: 'Select Role',
                    ajax: {
                        url: "{{ route('role.ajaxsearch') }}",
                        dataType: 'json',
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
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
