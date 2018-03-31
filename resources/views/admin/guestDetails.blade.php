@extends('layouts.admin-layout')

@section('title', 'Guest Orders')

@section('admin-body')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <br>
      <h1 class="text-center text-muted">Latest Guest Order Details</h1>
      <br>
      <div class="table-responsive">
        <table class="table table-hover">
          <tr>
            <th>Guest Name</th>
            <th>Guest Phone</th>
            <th>Guest Email</th>
            <th>Guest Address</th>
            <th>Payment Method</th>
            <th>Details</th>
          </tr>
          @foreach($guest as $g)
          <tr>
            <td>
              {{$g->name}}
              <br>
              <span class="pull-left" style="color: blue;">{{$g->created_at->diffForHumans()}}</span>
            </td>
            <td>{{$g->phone}}</td>
            <td>{{$g->email}}</td>
            <td>{{$g->address}}</td>
            <td>{{$g->payment_method}}</td>
            <td><a href="{{url('admin/getCart/'.$g->id)}}" type="button" class="btn btn-warning">Details</a></td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
