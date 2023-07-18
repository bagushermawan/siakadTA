@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <div class="section-body">
         <h4>Selamat Datang <b>{{Auth::user()->name}}</b>, Anda Login sebagai <b>{{Auth::user()->role}}</b>.</h4>

        dadawd
    </div>
@endsection
