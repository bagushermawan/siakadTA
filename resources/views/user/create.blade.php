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
        <h2 class="section-title">User</h2>
            <p class="section-lead">
              You can manage all users, such as editing, deleting and more.
            </p>
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                          <h4>HTML5 Form Basic</h4>
                        </div>
                        <div class="card-body">
                          <div class="alert alert-info">
                            <b>Note!</b> Not all browsers support HTML5 type input.
                          </div>
                          <div class="form-group">
                            <label>Text</label>
                            <input type="text" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Select</label>
                            <select class="form-control">
                              <option>Option 1</option>
                              <option>Option 2</option>
                              <option>Option 3</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Select Multiple</label>
                            <select class="form-control" multiple="" data-height="100%" style="height: 100%;">
                              <option>Option 1</option>
                              <option>Option 2</option>
                              <option>Option 3</option>
                              <option>Option 3</option>
                            </select>
                          </div>
                          <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                          </div>
                      </div>
                </div>
            </div>
    </div>
@endsection