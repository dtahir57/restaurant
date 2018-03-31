@extends('layouts.admin-layout')

@section('title', 'Mange Reservations')

@section('admin-body')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <br>
      <br>
      <h1 class="text-center">Latest Today's Reservations</h1>
      <br>
      <br>
      @if (session('delete_msg'))
      <li class="alert alert-success">{{session('delete_msg')}}</li>
      @endif
      <div class="table-responsive">
        <table class="table table-hover">
          <tr>
            <th>Full Name</th>
            <th>Email Address</th>
            <th>Reservation Type</th>
            <th>No. Of Guests</th>
            <th>Special Request</th>
            <th>Decline</th>
          </tr>
          @foreach($getR as $reserved)
          <tr>
            <td>{{$reserved->fullName}}
              <br>
              <span class="pull-left" style="color: blue;">{{$reserved->created_at->diffForHumans()}}</span>
            </td>
            <td>{{$reserved->email}}</td>
            <td>{{$reserved->type}}</td>
            <td>{{$reserved->no_of_guests}}</td>
            <td>{{$reserved->special_request}}</td>
            <td><a href="{{url('admin/manage-reservation/del/'.$reserved->id)}}" type="button" class="btn btn-danger btn-sm">&#10006;</a></td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
