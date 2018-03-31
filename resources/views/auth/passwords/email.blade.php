@extends('layouts.app')

@section('title', 'Enter Your Email')
<style media="screen">
div.email-main-bg{
  background-image: url('{{asset("public/images/featured.jpg")}}');
  background-size: cover;
  background-repeat: no-repeat;
}
div.email-section{
  background: rgba(255,0,0,0.3);
  width: 100%;
  height: 550px;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px 20px;
}
div.email-form-section{
  width: 100%;
  height: auto;
  padding: 25px 20px;
  background-color: #fff;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>
@section('body')
<div class="email-main-bg">
  <div class="email-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-offset-2">
          <div class="email-form-section">
            <h1 class="text-center">Reset Password</h1>
            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                  <div class="col-md-6">
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                      <button type="submit" class="btn btn-danger">
                          Send Password Reset Link
                      </button>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
