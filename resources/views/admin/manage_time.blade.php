@extends('layouts.admin-layout')

@section('title', 'Manage Timings')

@section('admin-body')
<div class="container">
    <br>
    <br>
    <h1 class="text-center">Add Restaurant's Opening & Closing Hours</h1>
    <div class="row">
      <div class="col-md-12">
        <form class="form-horizontal" action="{{URL('admin/manage_time/'.$id)}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <legend>From Time</legend>
            <input type="time" name="opening_hr" class="form-control" value="{{old('opening_hr')}}" />
          </div>
          <div class="form-group">
            <legend>To Time</legend>
            <input type="time" name="closing_hr" class="form-control" value="{{old('closing_hr')}}" />
          </div>
          <input type="hidden" name="restaurant_id" value="{{$id}}" />
          <input type="submit" name="Set Timings" class="btn btn-success btn-block" value="Set Timings" />
        </form>
      </div>
    </div>
</div>
@endsection
