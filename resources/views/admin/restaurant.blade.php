@extends('layouts.admin-layout')

@section('title', 'Add Restaurant')

@section('admin-body')
<div class="container">
    <div class="row">
      <div class="col-md-10 col-sm-offset-1 col-xs-10">
        <h1 class="text-center">Add A Restaurant</h1>
        @if(session('msg'))
          <p class="alert alert-success">{{session('msg')}}</p>
        @endif
        @foreach($errors->all() as $error)
        <li class="alert alert-danger">{{$error}}</li>
        @endforeach
        <form class="form-horizontal" action="{{route('create-restaurant')}}" method="post" role="form" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Name</label>
            <div class="col-sm-10">
              <input type="text" name="res_name" class="form-control" />
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Description</label>
            <div class="col-sm-10">
              <textarea name="res_desc" rows="8" cols="80" class="form-control"></textarea>
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Address</label>
            <div class="col-sm-10">
              <input type="text" name="res_address" class="form-control" />
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Logo</label>
            <div class="col-sm-10">
              <input type="file" name="res_logo" class="form-control" />
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Reservations</label>
            <div class="col-sm-10">
              <input type="number" name="reservations" class="form-control" />
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Phone</label>
            <div class="col-sm-10">
              <input type="text" name="res_phone" class="form-control" />
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Email</label>
            <div class="col-sm-10">
              <input type="email" name="res_email" class="form-control" />
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Facebook URL</label>
            <div class="col-sm-10">
              <input type="text" name="res_fb" class="form-control" />
              <pre class="text-muted">Please type '#' if you don't have any Facebook URL.</pre>
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Google URL</label>
            <div class="col-sm-10">
              <input type="text" name="res_google" class="form-control" />
              <pre class="text-muted">Please type '#' if you don't have any Google URL.</pre>
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Twitter URL</label>
            <div class="col-sm-10">
              <input type="text" name="res_twitter" class="form-control" />
              <pre class="text-muted">Please type '#' if you don't have any Twitter URL.</pre>
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Youtube URL</label>
            <div class="col-sm-10">
              <input type="text" name="res_youtube" class="form-control" />
              <pre class="text-muted">Please type '#' if you don't have any Youtube URL.</pre>
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Instagram URL</label>
            <div class="col-sm-10">
              <input type="text" name="res_insta" class="form-control" />
              <pre class="text-muted">Please type '#' if you don't have any Instagram URL.</pre>
            </div>
          </div>{{-- /.form-group --}}
          <input type="submit" value="Add A Restaurant" class="btn btn-success btn-block" />
        </form>
      </div>
    </div>
</div>
@endsection
