@extends('layouts.admin-layout')

@section('title', 'Admin Dashboard')
<style media="screen">
  div.box{
    margin-top: 30px;
    width: 100%;
    height 200px;
    padding: 10px 20px;
    background: #fff;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -o-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
</style>
@section('admin-body')
<div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="box">
          <h1 class="pull-right">{{$u}}</h1>
          <h1><span class="fa fa-users"></span> Users</h1>
        </div>
      </div>{{-- /.col-md-4 --}}
      <div class="col-md-4">
        <div class="box">
          <h1 class="pull-right">{{$c}}</h1>
          <h1><span class="fa fa-tags"></span> Meal Categories</h1>
        </div>
      </div>{{-- /.col-md-4 --}}
      <div class="col-md-4">
        <div class="box">
          <h1 class="pull-right">{{$r}}</h1>
          <h1><span class="fa fa-cutlery"></span> Total Restaurants</h1>
        </div>
      </div>{{-- /.col-md-4 --}}
    </div>
    <br>
    <br>
    <br>
    <div class="row">
      <div class="col-md-12">
        <center><h1>Most Recent Users</h1></center>
        <br>
        <br>
        <table class="table table-condensed">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Address</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->phone}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->address}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>{{-- /.row --}}
</div>
@endsection
