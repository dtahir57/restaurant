@extends('layouts.admin-layout')

@section('title', 'Manage Restaurants')
<style media="screen">
  div.rstrnts-wrapper{
    width: 100%;
    height: auto;
    padding: 20px 25px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -o-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    background-color: #fff;
  }
  ul#list-btn > li{
    list-style-type: none;
    float: left;
    padding: 8px;
  }
</style>
@section('admin-body')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      @if (session('timing_mesg'))
        <li class="alert alert-success">{{session('timing_mesg')}}</li>
      @endif
      <h1 class="text-center lead" style="font-size: 40px;">Manage Restaurants</h1>
      @foreach($restaurants as $r)
      <div class="rstrnts-wrapper">
        <div class="row">
          <div class="col-xs-3" style="padding: 20px;">
            <img src="{{asset('public/'.$r->logo)}}" class="img-responsive" style="width: 200px; height: 150px;" alt="">
          </div>
          <div class="col-xs-9" style="padding: 20px;">
            <h1>Restaurant Name: <span class="lead"> {{$r->name}}<span></h1>
            <h1>Description: <span class="lead">{{$r->description}}</span></h1>
            <h1>Address: <span class="lead">{{$r->address}}</span></h1>
            <h1>Total Reservation: <span class="lead">{{$r->reservations}}</span></h1>
            <h1>Contact No. <span class="lead">{{$r->phone}}</span></h1>
            <h1>Email: <span class="lead">{{$r->email}}</span></h1>
            <h1>Opening Time:
              <span class="lead">
                @if (empty($r->hour->fromTime))
                Not Defined
                  @else
                  {{$r->hour->fromTime}}
                @endif
              </span>
            </h1>
            <h1>Closing Time:
              <span class="lead">
                @if (empty($r->hour->toTime))
                Not Defined
                  @else
                  {{$r->hour->toTime}}
                @endif
              </span>
            </h1>
            <p class="lead">Facebook URL: <a href="{{$r->fb}}">{{$r->fb}}</a></p>
            <p class="lead">Google+ URL: <a href="{{$r->google}}">{{$r->google}}</a></p>
            <p class="lead">Twitter URL: <a href="{{$r->twitter}}">{{$r->twitter}}</a></p>
            <p class="lead">Youtube URL: <a href="{{$r->youtube}}">{{$r->youtube}}</a></p>
            <p class="lead">Instagram URL: <a href="{{$r->insta}}">{{$r->insta}}</a></p>
          </div>
        </div>
        <div class="row">
          <ul id="list-btn">
            <li><a href="{{url('admin/'.$r->id.'/edit_restaurant')}}" type="button" class="btn btn-info">Edit</a></li>
            <li><a href="{{url('admin/manage_restaurants/'.$r->id)}}" type="button" class="btn btn-danger">Delete</a></li>
            <li><a href="{{url('admin/manage-reservation/'.$r->id)}}" type="button" class="btn btn-warning">Manage Reservations</a></li>
            <li><a href="{{url('admin/manage_time/'.$r->id)}}" type="button" class="btn btn-success">Manage Timings</a></li>
          </ul>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
