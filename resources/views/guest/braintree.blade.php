@extends('layouts.app')

@section('title', 'Pay Online')

@section('body')
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-offset-2">
          <form id="payment-form" class="form-group" action="{{route('braintree')}}" method="post">
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
            <input type="hidden" name="subtotal" value="{{Cart::subtotal()}}" />
            <input type="hidden" name="payment_method" value="{{$get}}" />
            <div id="dropin-container"></div>
            <input type="hidden" id="nonce" name="payment_method_nonce"></input>
            <input type="submit" value="Purchase {{Cart::subtotal()}} $" class="btn btn-success btn-block btn-lg"></input>
          </form>
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
