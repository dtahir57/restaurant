@extends('layouts.app')

@section('title', 'Confirmation')

@section('body')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      @if ($msg = Session::get('msg'))
        <li class="alert alert-success">{{$msg}}</li>
      @endif
      <h1 class="text-center">Thank You For Shopping With Us</h1>
    </div>
  </div>
</div>
@endsection
