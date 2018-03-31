@extends('layouts.app')

@section('title', 'Cash On Delivery')
<style media="screen">
  body{
    overflow: hidden;
  }
  div.checkout-sec{
    padding: 20px;
  }
</style>
@section('body')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="checkout-sec">
        <h1 class="text-center">Checkout Details</h1>
        @foreach($errors->all() as $error)
          <li class="alert alert-danger">{{$error}}</li>
        @endforeach
        <form class="form-horizontal" action="{{route('createOrder')}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label><h2>User Name</h2></label>
            <input type="text" name="u_name" class="form-control" value="{{$uId->name}}" required />
            <input type="hidden" name="payment_method" value="{{$get}}">
            <input type="hidden" name="subtotal" value="{{Cart::subtotal()}}">
          </div>
          <div class="form-group">
            <label><h2>Phone No.</h2></label>
            <input type="tel" name="u_phone" class="form-control" value="{{$uId->phone}}" required />
          </div>
          <div class="form-group">
            <label><h2>Email</h2></label>
            <input type="email" name="u_email" class="form-control" value="{{$uId->email}}" required />
          </div>
          <div class="form-group">
            <label><h2>Shipping Address</h2></label>
            <input type="text" name="u_address" class="form-control" value="{{$uId->address}}" required />
          </div>
          <input type="submit" name="submit" class="btn btn-success btn-lg btn-block" value="Order Now">
        </form>{{-- /form --}}
      </div>
    </div>
  </div>
</div>
@endsection
