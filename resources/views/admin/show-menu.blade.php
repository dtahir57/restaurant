@extends('layouts.admin-layout')

@section('title', 'Show Menu')
<style media="screen">
  div.show-item{
    margin-top: 20px;
    width: 100%;
    height: auto;
    padding: 25px 30px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -o-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    background-color: #fff;
  }
  div.img-section{
    width: 100%;
    height: 200px;
    padding: 20px;
  }
  ul.btn-lists > li{
    list-style-type: none;
    float: left;
    padding: 10px;
    display: block;
  }
</style>
@section('admin-body')

<div class="container-fluid">
  <div style="padding: 20px;">
    @if (session('msg'))
    <li class="alert alert-success">{{session('msg')}}</li>
    @endif
    <h1 class="text-center text-muted">All Available/Added Menu Items</h1>
    @foreach($get as $g)
    <div class="show-item">
      <div class="row">
        <div class="col-xs-4">
          <div class="img-section">
            <img src="{{asset('public/'.$g->item_img)}}" class="img-responsive" style="width: 100px; height: 100px;" alt="">
          </div>
        </div>
        <div class="col-xs-8">
          <h1><strong>Title:</strong> {{$g->title}}</h1>
          <p class="lead"><strong>Description:</strong> {{$g->description}}</p>
          <h3 class="lead"><strong>Price:</strong> {{$g->price}}</h3>
        </div>
      </div>
      <div class="row">
        <ul class="btn-lists">
          <li><a href="{{url('admin/'.$g->id.'/edit_menu')}}" type="button" class="btn btn-info">Edit</a></li>
          <li><a href="{{url('admin/show-menu/'.$g->id)}}" type="button" class="btn btn-danger">Delete</a></li>
        </ul>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection
