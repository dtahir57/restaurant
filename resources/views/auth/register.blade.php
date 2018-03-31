@extends('layouts.app')

@section('title', 'Register')
<style media="screen">
  div.main-bg{
    background-image: url('{{asset("public/images/featured.jpg")}}');
    background-size: cover;
    background-repeat: no-repeat;
  }
  div.register-section{
    background: rgba(255,0,0,0.3);
    width: 100%;
    height: 600px;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px 20px;
  }
  div.form-section{
    width: 100%;
    height: auto;
    padding: 25px 20px;
    background-color: #fff;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
  input.input-lg{
    border-radius: 0px;
  }
  input.input-lg:focus{
    border-color: red;
  }
</style>
@section('body')
<div class="main-bg">
  <div class="register-section">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-sm-offset-1">
          <div class="form-section">
            <h1 class="text-center">Register</h1>
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
              {{csrf_field()}}
              <div class="col-sm-6 col-sm-offset-4">

              </div>
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <div class="col-md-12">
                      <input id="name" type="text" class="form-control input-lg" name="name" value="{{ old('name') }}" required autofocus placeholder="Full Name">
                      @if ($errors->has('name'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <div class="col-md-12">
                      <input id="phone" type="tel" class="form-control input-lg" name="phone" value="{{ old('phone') }}" required autofocus placeholder="Phone Number">
                      @if ($errors->has('phone'))
                          <span class="help-block">
                              <strong>{{ $errors->first('phone') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <div class="col-md-12">
                      <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" required placeholder="Email Address">
                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <div class="col-md-12">
                      <input id="address" type="text" class="form-control input-lg" name="address" value="{{ old('address') }}" required autofocus placeholder="Address">
                      @if ($errors->has('address'))
                          <span class="help-block">
                              <strong>{{ $errors->first('address') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <div class="col-md-12">
                      <input id="password" type="password" class="form-control input-lg" name="password" required placeholder="Password">
                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-md-12">
                      <input id="password-confirm" type="password" class="form-control input-lg" name="password_confirmation" required placeholder="Confirm Password">
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                      <button type="submit" class="btn btn-danger btn-lg btn-block">
                          Register
                      </button>
                  </div>
              </div>
            </form>
            <p>Already have an account? <a href="{{route('login')}}">Login</a></p>
          </div>{{-- /.form-section --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
