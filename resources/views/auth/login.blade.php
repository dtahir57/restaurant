@extends('layouts.app')

@section('title','Login')
<style media="screen">
  div.login-main-bg{
    background-image: url('{{asset("public/images/featured.jpg")}}');
    background-size: cover;
    background-repeat: no-repeat;
  }
  div.login-section{
    background: rgba(255,0,0,0.3);
    width: 100%;
    height: 600px;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px 20px;
  }
  div.login-form-section{
    width: 100%;
    height: auto;
    padding: 25px 20px;
    background-color: #fff;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
</style>
@section('body')
<div class="login-main-bg">
  <div class="login-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-offset-2">
          <div class="login-form-section">
            <h1 class="text-center">Login Details</h1>
            <br>
            <br>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <div class="col-md-12">
                      <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">

                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
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
                  <div class="col-md-3">
                      <div class="checkbox">
                          <label>
                              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                          </label>
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-md-6">
                      <button type="submit" class="btn btn-danger btn-lg">
                          Login
                      </button>

                      <a class="btn btn-link" href="{{ route('password.request') }}">
                          Forgot Your Password?
                      </a>
                  </div>
              </div>
            </form>{{-- /form-closing here --}}
          </div>{{-- /.login-form-section --}}
        </div>{{-- /.col-md-8.col-sm-offset-2 --}}
      </div>
    </div>
  </div>
</div>
@endsection
