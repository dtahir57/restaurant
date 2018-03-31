@extends('layouts.app')

@section('title', 'Restaurant')

@section('body')
<div class="container">
    <div class="row">
      <div class="col-md-4">
        <img src="../public/{{$restaurant->logo}}" class="img-responsive" alt="">
      </div>
      <div class="col-md-8">
        <h1>{{$restaurant->name}}</h1>
        <p class="lead">{{$restaurant->description}}</p>
        <strong><p>{{$restaurant->address}}</p></strong>
        <p>Total Reservation: {{$restaurant->reservations}}</p>
        <h3>Opening Time:
          <span class="lead">
            @if (empty($restaurant->hour->fromTime))
            Not Defined
              @else
              {{$restaurant->hour->fromTime}}
            @endif
          </span>
        </h3>
        <h3>Closing Time:
          <span class="lead">
            @if (empty($restaurant->hour->toTime))
            Not Defined
              @else
              {{$restaurant->hour->toTime}}
            @endif
          </span>
        </h3>
        {{--<h3 class="lead">Facebook URL: {{$restaurant->fb}}</h3>
        <h3 class="lead">Google+ URL: {{$restaurant->google}}</h3>
        <h3 class="lead">Twitter URL: {{$restaurant->twitter}}</h3>
        <h3 class="lead">Youtube URL: {{$restaurant->youtube}}</h3>
        <h3 class="lead">Instagram URL: {{$restaurant->insta}}</h3>--}}
      </div>
    </div>
    <br>
    <br>
    @if ($reserve < $restaurant->reservations)
      @if (session('msgz'))
        <li class="alert alert-success">{{session('msgz')}}</li>
      @endif
      @if ($restaurant->reservations - $reserve == 1)
        <li class="alert alert-warning">There is only 1 reservation left!</li>
        @else
        <li class="alert alert-warning">There are only {{$restaurant->reservations - $reserve}} reservations left!</li>
      @endif
    <div class="row">
      <div class="col-md-8 col-sm-offset-2" style="padding: 20px;">
      <h1 class="text-center">Reserve A Table</h1>
        <form class="form-horizontal" action="{{url('single-show-restaurant/'.$restaurant->id)}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label><h2>Full Name</h2></label>
            <input type="text" name="full_name" class="form-control" value="" />
          </div>
          <div class="form-group">
            <label><h2>Email</h2></label>
            <input type="text" name="reserve_email" class="form-control" value="" />
          </div>
          <div class="form-group">
            <label><h2>Reservation Type</h2></label>
            <select class="form-control" name="type">
              <option disabled selected>-SELECT-</option>
              <option value="Breakfast">Breakfast</option>
              <option value="Lunch">Lunch</option>
              <option value="Dinner">Dinner</option>
            </select>
          </div>
          <div class="form-group">
            <label><h2>No. Of Guests</h2></label>
            <input type="number" name="no_of_guests" class="form-control" value="">
          </div>
          <div class="form-group">
            <label><h2>Special Request</h2></label>
            <textarea name="special_request" rows="8" class="form-control" cols="80"></textarea>
          </div>
          <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}" />
          <input type="hidden" name="reservations" value="{{$restaurant->reservations}}">
          <input type="submit" name="submit" class="btn btn-success btn-lg btn-block" value="Reserve A Table" />
        </form>
      </div>
    </div>
    @else
    <li class="alert alert-danger">No More Reservations Left For Today! All Booked!</li>
  @endif
</div>
@endsection
