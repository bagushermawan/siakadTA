@extends('layouts.master')
@section('title', 'User')
@section('header', 'User')
@section('button-header')
<div class="section-header-button">
    <a href="{{route('user.create')}}" class="btn btn-primary">Add New</a>
  </div>
@endsection
@push('page-css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.10.4/dayjs.min.js"></script>
@endpush
@php
    $helper = new \App\Helpers\Helper;
@endphp
@section('content')
    <div class="section-body">
        <p class="section-title">
          <p class="section-lead">
              You can manage all users, such as editing, deleting and more.
          </p>
      </p>
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped dataTable no-footer" id="table-1" role="grid"
                                        aria-describedby="table-1_info">
                                        <thead>
                                            <tr role="row">
                                                <th style="width: 5%;"><center>No</center></th>
                                                <th class="sorting"style="width: 20%;">Name</th>
                                                <th class="sorting"style="width: 10%;">Email</th>
                                                {{-- <th class="sorting"style="width: 20%;">Password</th> --}}
                                                <th class="sorting"style="width: 20%;">Alamat</th>
                                                {{-- <th class="sorting"style="width: 13%;">Tanggal Lahir</th> --}}
                                                <th class="sorting"style="width: 10%;">Role</th>
                                                {{-- <th class="sorting"style="width: 10%;">password</th> --}}
                                                <th style="width: 15%;">
                                                    <center>Created at</center>
                                                </th>
                                                <th style="width: 15%;">
                                                    <center>Last Logged in</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($daftar_user as $no => $user)
                                            <tr role="row" class="even">
                                                <td>
                                                    <center>
                                                        {{++$no + ($daftar_user->currentPage()-1) * $daftar_user->perPage()}}
                                                    </center>
                                                </td>
                                                <td>{{ $user->nama }}
                                                  <div class="table-links">
                                                    <a href="{{ route('user.edit', ['id'=>$user->id])}}">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="{{ route('user.destroy', ['id'=>$user->id])}}" class="text-danger">Delete</a>
                                                  </div>
                                                </td>
                                                <td>{{$user->email}}</td>
                                                {{-- <td>{{$user->password}}</td> --}}
                                                <td>{{$user->alamat}}</td>
                                                {{-- <td>{{$user->tgl_lahir}}</td> --}}
                                                <td>{{$user->role}}</td>
                                                {{-- <td>{{$user->password}}</td> --}}

                                                <td class="text-right">
                                                    <center>
                                                        {{$user->created_at->format('d M Y, H:i')}}
                                                    </center>
                                                </td>
                                                <td class="text-right">
                                                    <center>
                                                        {{ $helper->formatLastLogin($user->login_time) }}
                                                    </center>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- {{$daftar_category->links()}} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('page-script')
<script>
function formatLastLogin(loginTime) {
    const now = dayjs();
    const login = dayjs(loginTime);
    const diffInMinutes = now.diff(login, 'minute');
    const diffInHours = now.diff(login, 'hour');
    const diffInDays = now.diff(login, 'day');

    if (diffInMinutes < 1) {
        return 'Baru saja';
    } else if (diffInMinutes < 60) {
        return `${diffInMinutes} menit yang lalu`;
    } else if (diffInHours < 24) {
        return `${diffInHours} jam yang lalu`;
    } else {
        return `${diffInDays} hari yang lalu`;
    }
}
</script>
    
@endpush