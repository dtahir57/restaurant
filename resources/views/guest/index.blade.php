@extends('layouts.app')

@section('title', 'Guest Checkout')

@section('body')
<div class="container" style="padding: 20px 20px;">
  <div class="row">
    <form class="form-horizontal" action="{{route('storeGuest')}}" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <legend>Name</legend>
        <input type="text" class="form-control" name="guest_name" value="{{old('guest_name')}}" />
      </div>
      <div class="form-group">
        <legend>Phone</legend>
        <input type="text" class="form-control" name="guest_phone" value="{{old('guest_phone')}}" />
      </div>
      <div class="form-group">
        <legend>Email</legend>
        <input type="email" name="guest_email" class="form-control" value="{{old('guest_email')}}">
      </div>
      <div class="form-group">
        <legend>Address</legend>
        <input type="text" name="guest_address" class="form-control" value="{{old('guest_address')}}">
      </div>
      <div class="form-group">
        <legend>Payment Method</legend>
        COD: <input type="radio" name="payment_method" value="Cash On Delivery" checked />
        PAYPAL: <input type="radio" name="payment_method" value="Paypal" />
      </div>
      <input type="submit" name="submit" class="btn btn-success btn-lg btn-block" value="ORDER YOUR MEAL" />
    </form>
  </div>
</div>
@endsection
