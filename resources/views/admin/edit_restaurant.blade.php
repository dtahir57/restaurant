@extends('layouts.admin-layout')

@section('title', 'Edit Restaurant')

@section('admin-body')

<div class="container">
    <div class="row">
      <div class="col-md-10 col-sm-offset-1 col-xs-10">
        <h1 class="text-center">Update Restaurant Details</h1>
        {{--@if(session('msg'))
          <p class="alert alert-success">{{session('msg')}}</p>
        @endif--}}
        <form class="form-horizontal" action="{{url('admin/manage_restaurants/'.$res->id)}}" method="post" role="form" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Name</label>
            <div class="col-sm-10">
              <input type="text" name="res_name" class="form-control" value="{{$res->name}}" />
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Description</label>
            <div class="col-sm-10">
              <textarea name="res_desc" rows="8" cols="80" class="form-control">{{$res->description}}</textarea>
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Address</label>
            <div class="col-sm-10">
              <input type="text" name="res_address" class="form-control" value="{{$res->address}}" />
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Logo</label>
            <div class="col-sm-10">
              <input type="file" name="res_logo" class="form-control" required />
              <pre>Previously Uploaded Image</pre>
              <img src="{{asset('public/'.$res->logo)}}" class="img-responsive" style="width: 180px; height: 100px;" />
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Reservations</label>
            <div class="col-sm-10">
              <input type="number" name="reservations" class="form-control" value="{{$res->reservations}}" />
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Phone</label>
            <div class="col-sm-10">
              <input type="text" name="res_phone" class="form-control" value="{{$res->phone}}" />
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Email</label>
            <div class="col-sm-10">
              <input type="email" name="res_email" class="form-control" value="{{$res->email}}" />
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Facebook URL</label>
            <div class="col-sm-10">
              <input type="text" name="res_fb" class="form-control" value="{{$res->fb}}" />
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Google URL</label>
            <div class="col-sm-10">
              <input type="text" name="res_google" class="form-control" value="{{$res->google}}" />
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Twitter URL</label>
            <div class="col-sm-10">
              <input type="text" name="res_twitter" class="form-control" value="{{$res->twitter}}" />
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Youtube URL</label>
            <div class="col-sm-10">
              <input type="text" name="res_youtube" class="form-control" value="{{$res->youtube}}" />
            </div>
          </div>{{-- /.form-group --}}
          <div class="form-group row">
            <label for="" class="control-label col-sm-2">Instagram URL</label>
            <div class="col-sm-10">
              <input type="text" name="res_insta" class="form-control" value="{{$res->insta}}" />
            </div>
          </div>{{-- /.form-group --}}
          <input type="submit" value="Update Restaurant Information" class="btn btn-success btn-block" />
        </form>
      </div>
    </div>
</div>

@endsection
