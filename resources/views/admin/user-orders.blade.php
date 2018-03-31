@extends('layouts.admin-layout')

@section('title', 'User Order Details')

@section('admin-body')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <br>
      <h1 class="text-center">User Order Details</h1>
      <br>
      <br>
      <div class="table-responsive">
        <table class="table table-hover">
          <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Payment Method</th>
            <th>Details</th>
          </tr>
          @foreach($u_orders as $order)
          <tr>
            <td>{{$order->u_name}}
                <br>
                <span class="pull-left" style="color: blue;">{{$order->created_at->diffForHumans()}}</span>
              </td>
            <td>{{$order->u_phone}}</td>
            <td>{{$order->u_email}}</td>
            <td>{{$order->u_address}}</td>
            <td>{{$order->payment_method}}</td>
            <td><a href="{{url('admin/user-details/'.$order->id)}}" type="button" class="btn btn-warning btn-lg">Details</a></td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
