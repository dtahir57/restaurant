@extends('layouts.admin-layout')

@section('title', 'User Details')

@section('admin-body')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1 class="text-center">Cash On Delivery</h1>
      <div class="table-responsive">
        <table class="table table-hover">
          <tr>
            <th>Product Name</th>
            <th>Product Quantity</th>
            <th>Price</th>
            <th>Sub Total</th>
          </tr>
          @foreach($findD as $d)
          <tr>
            <td>{{$d->products}}</td>
            <td>{{$d->qty}}</td>
            <td>{{$d->price}} $</td>
            <td>{{$d->subtotal}}$</td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
