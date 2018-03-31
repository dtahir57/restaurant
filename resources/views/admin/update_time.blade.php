@extends('layouts.admin-layout')

@section('title', 'Manage Timings')

@section('admin-body')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <br>
      <br>
      <h1 class="text-center">Update Timings</h1>
      <form class="form-horizontal" action="{{URL('admin/update_time')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <legend>From Time</legend>
          <input type="time" name="opening_hr" class="form-control" value="{{$hour->fromTime}}" />
        </div>
        <div class="form-group">
          <legend>To Time</legend>
          <input type="time" name="closing_hr" class="form-control" value="{{$hour->toTime}}" />
        </div>
        <input type="hidden" name="restaurant_id" value="{{$hour->restaurant_id}}" />
        <input type="submit" name="Set Timings" class="btn btn-success btn-block" value="Set Timings" />
      </form>
    </div>
  </div>
</div>

@endsection
