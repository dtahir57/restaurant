@extends('layouts.app')

@section('title', 'Home')
<style media="screen">
  .banner{
    overflow: hidden;
  }
  i#fa{
    font-size: 100px;
    color: red;
  }
</style>
@section('body')
<div class="banner">
<div class="banner-slider">
  <div class="container">
    <div class="slider">
      <div class="callbacks_container">
        <ul class="rslides" id="slider4">
          <li>
            <div class="banner-info">
              <h3>Lorem ipsum dolor sit amet</h3>
              <p>Donec tellus metus, ornare et mollis ut, maximus id nisi. Quisque scelerisque accumsan sem nec ullamcorper. Cras sed purus eget augue egestas commodo. Sed erat magna, pharetra aliquet mattis mollis, maximus eget lacus. </p>
              <a href="{{route('menu')}}">Menu</a>
            </div>
          </li>
          <li>
            <div class="banner-info">
              <h3>Fusce egestas purus in nulla</h3>
              <p>Sed erat magna, pharetra aliquet mattis mollis, maximus eget lacus. Donec tellus metus, ornare et mollis ut, maximus id nisi. Quisque scelerisque accumsan sem nec ullamcorper. Cras sed purus eget augue egestas commodo. </p>
              <a href="{{route('menu')}}">Menu</a>
            </div>
          </li>
          <li>
            <div class="banner-info">
              <h3>Duis faucibus dolor risus</h3>
              <p>Quisque scelerisque accumsan sem nec ullamcorper. Donec tellus metus, ornare et mollis ut, maximus id nisi. Cras sed purus eget augue egestas commodo. Sed erat magna, pharetra aliquet mattis mollis, maximus eget lacus. </p>
              <a href="{{route('menu')}}">Menu</a>
            </div>
          </li>
          <li>
            <div class="banner-info">
              <h3>Lorem ipsum dolor sit amet</h3>
              <p>Donec tellus metus, ornare et mollis ut, maximus id nisi. Quisque scelerisque accumsan sem nec ullamcorper. Cras sed purus eget augue egestas commodo. Sed erat magna, pharetra aliquet mattis mollis, maximus eget lacus. </p>
              <a href="{{route('menu')}}">Menu</a>
            </div>
          </li>
          <li>
            <div class="banner-info">
              <h3>Fusce egestas purus in nulla</h3>
              <p>Sed erat magna, pharetra aliquet mattis mollis, maximus eget lacus. Donec tellus metus, ornare et mollis ut, maximus id nisi. Quisque scelerisque accumsan sem nec ullamcorper. Cras sed purus eget augue egestas commodo. </p>
              <a href="{{route('menu')}}">Menu</a>
            </div>
          </li>
        </ul>
      </div>
      <!--banner Slider starts Here-->
    </div>
  </div>
</div>
</div>
<div class="container" style="padding: 25px;">
  <div class="row text-center">
    <h1 class="text-center">Get Your Food In 3 Steps</h1>
    <br>
    <div class="col-md-4">
      <i class="fa fa-coffee" aria-hidden="true" id="fa"></i>
      <h2 class="text-center">Choose</h2>
      <p class="lead text-center">Browse hundreds of menus to find the food you like</p>
    </div>
    <div class="col-md-4">
      <i class="fa fa-credit-card-alt" id="fa"></i>
      <h2 class="text-center">Pay</h2>
      <p class="lead text-center">Pay fast & secure online or on delivery</p>
    </div>
    <div class="col-md-4">
      <i class="fa fa-truck" id="fa"></i>
      <h2 class="text-center">Deliver</h2>
      <p class="lead text-center">Food is prepared & delivered to your door</p>
    </div>
  </div>
  <br>
  <br>
  <h1 class="text-center">Contact Us</h1>
  @if (session('messages'))
    <li class="alert alert-success">{{session('messages')}}</li>
  @endif
  <div class="row">
    <div class="col-md-8 col-sm-offset-2">
      <form class="form-horizontal" action="{{route('contact')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label><h2>Name</h2></label>
          <input type="text" name="name" class="form-control" value="{{old('name')}}" />
        </div>
        <div class="form-group">
          <label><h2>Email</h2></label>
          <input type="email" name="email" class="form-control" value="{{old('email')}}">
        </div>
        <div class="form-group">
          <label><h2>Message</h2></label>
          <textarea name="message" class="form-control" rows="8" cols="80"></textarea>
        </div>
        <input type="submit" name="submit" class="btn btn-danger btn-block btn-lg" value="Contact Us" />
      </form>
    </div>
  </div>
</div>
@endsection
        <!--<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
        </div> -->
