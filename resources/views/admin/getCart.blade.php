@extends('layouts.admin-layout')

@section('title', 'Cart Details')

@section('admin-body')
<div class="container">
  <div class="row">
    <div class="col-sm-6 col-sm-offset-4">
      <h1>Order Detail</h1>
      <div class="table-responsive">
        <table class="table table-responsive">
          <tr>
            <th>Product Name</th>
            <th>Product Quantity</th>
            <th>Product Price</th>
            <th>Amount To Receive</th>
          </tr>
          @foreach($cart as $c)
          <tr>
            <td>{{$c->products}}</td>
            <td>{{$c->qty}}</td>
            <td>{{$c->price}} $</td>
            <td>{{$c->subtotal}} $</td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
