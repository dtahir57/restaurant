@extends('layouts.app')

@section('title', 'Cart')
<style media="screen">
a.cross-btn:link{
  text-decoration: none;
}
div.cart-section{
  width: 100%;
  height: auto;
  padding: 40px 25px;
}
</style>
@section('body')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="cart-section">
        <div class="table-responsive">
          <table class="table table-hover">
            <tr>
              <th>Item Name</th>
              <th>Qty</th>
              <th>Total Price</th>
              <th>Remove Item</th>
            </tr>
            @foreach($cartItems as $cartItem)
            <tr>
              <td>{{$cartItem->name}}</td>
              <td>{{$cartItem->qty}}</td>
              <td>{{$cartItem->price * $cartItem->qty}} $</td>
              <td>
                <form action="{{url('cart/'.$cartItem->rowId)}}" method="post">
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                  <input type="submit" name="submit" value="&#10006;" class="btn btn-danger"/>
                </form>
              </td>
            </tr>
            @endforeach
            @if(Cart::subtotal() != 0)
            <tr>
              <td><strong>Sub Total</strong></td>
              <td>{{Cart::subtotal()}} $</td>
              @if (Auth::guest())
              <td><a href="{{route('login')}}" type="button" class="btn btn-default">Login</a> OR Order as Guest
                <form action="{{route('method')}}" method="get">
                  {{csrf_field()}}
                  <legend>Payment Method</legend>
                  COD: <input type="radio" name="payment_method" value="Cash On Delivery" checked required />
                  Braintree: <input type="radio" name="payment_method" value="Braintree" required />
                  <input type="submit" name="submit" class="btn btn-success" value="Order as Guest" />
                </form>
                {{--<a href="{{route('guestOrder')}}">Order as Guest</a>--}}
              </td>
              @else
              <td>
                <form action="{{route('orders')}}" method="get">
                  {{csrf_field()}}
                  <legend>Payment Method</legend>
                  COD: <input type="radio" name="payment_method" value="Cash On Delivery" checked required />
                  Braintree: <input type="radio" name="payment_method" value="Braintree" required />
                  <input type="submit" name="submit" class="btn btn-success" value="Place Order Now" />
                </form>
              </td>
              @endif
            </tr>
            @else
            <tr>
              <td><a href="{{route('menu')}}" type="button" class="btn btn-danger">Continue Shopping</a></td>
            </tr>
            @endif
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
