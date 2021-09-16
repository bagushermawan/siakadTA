@extends('layouts.master')
@section('title', 'User')
@section('header', 'User')
@section('button-header')
<div class="section-header-button">
    <a href="{{route('user.create')}}" class="btn btn-primary">Add New</a>
  </div>
@endsection
@section('content')
    <div class="section-body">
        <h2 class="section-title">User</h2>
            <p class="section-lead">
              You can manage all users, such as editing, deleting and more.
            </p>
    </div>
@endsection