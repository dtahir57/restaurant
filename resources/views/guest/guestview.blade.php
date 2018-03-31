@extends('layouts.app')

@section('title', 'Cash On Delivery')

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
      <input type="hidden" name="payment_method" value="{{$get}}">
      <input type="hidden" name="subtotal" value="{{Cart::subtotal()}}">
      <input type="submit" name="submit" class="btn btn-success btn-lg btn-block" value="ORDER YOUR MEAL" />
    </form>
  </div>
</div>
@endsection
