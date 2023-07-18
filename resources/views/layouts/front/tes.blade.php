@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <div class="section-body">
         <h4>Selamat Datang <b>{{Auth::user()->nama}}</b>(<i>{{Auth::user()->role}})</i>.</h4>

        aweaweawe
    </div>
@endsection
