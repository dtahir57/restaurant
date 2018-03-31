@extends('layouts.app')

@section('title', 'Pay With Braintree')
<style media="screen">
  div.main{
    width: 100%;
    height: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px 20px;
  }
</style>
@section('body')
<div class="main">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-offset-2">
        <h1 class="text-center">Checkout Details</h1>
        @foreach($errors->all() as $error)
          <li class="alert alert-danger">{{$error}}</li>
        @endforeach
        <form class="form-horizontal" id="payment-form" action="{{route('userOrder')}}" method="post">
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
          <input type="hidden" name="subtotal" value="{{Cart::subtotal()}}">
          <input type="hidden" name="payment_method" value="{{$get}}" />
          <input type="hidden" name="clientToken" value="{{$clientToken}}">
          <div id="dropin-container"></div>
          <input type="hidden" id="nonce" name="payment_method_nonce"></input>
          <input type="submit" class="btn btn-success btn-lg btn-block" value="Order Now">
        </form>{{-- /form --}}
      </div>
    </div>
  </div>
</div>
<script src="https://js.braintreegateway.com/web/dropin/1.6.1/js/dropin.min.js"></script>
<script>
  var form = document.querySelector('#payment-form');
  var nonceInput = document.querySelector('#nonce');

  braintree.dropin.create({
    authorization: '{{$clientToken}}',
    container: '#dropin-container'
  }, function (err, dropinInstance) {
    if (err) {
      // Handle any errors that might've occurred when creating Drop-in
      console.error(err);
      return;
    }
    form.addEventListener('submit', function (event) {
      event.preventDefault();

      dropinInstance.requestPaymentMethod(function (err, payload) {
        if (err) {
          // Handle errors in requesting payment method
          return;
        }

        // Send payload.nonce to your server
        nonceInput.value = payload.nonce;
        form.submit();
      });
    });
  });
</script>
@endsection
