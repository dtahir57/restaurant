@extends('layouts.app')

@section('title', 'Our Restaurants')
<style media="screen">
  div.restaurant-contents{
    background-repeat: no-repeat;
    width: 100%;
    background-size: cover;
    height: 400px;
  }
  div.inner-section{
    background-color: rgba(255, 0, 0, 0.3);
    padding: 20px;
    height: inherit;
  }
  .white{
    color: #fff;
  }
  a.btn.btn-default{
    border: 2px solid #fff;
    border-radius: 0px;
    background-color: #fff;
    color: red;
  }
  a.btn.btn-default:hover{
    border: 2px solid #fff;
    background-color: transparent;
    color: #fff;
  }ul#social-media-btns{
    padding: 0px;
  }
  ul#social-media-btns > li{
    list-style-type: none;
    float: left;
    padding: 20px;
  }
  i#fa{
    width: 80px;
    height: 80px;
    font-size: 40px;
    color: #fff;
    padding: 20px;
  }
  i#fa:hover{
    border-top-left-radius: 50%;
    border-top-right-radius: 50%;
    border-bottom-left-radius: 50%;
    border-bottom-right-radius: 50%;
    background-color: #fff;
    color: red;
  }
  @media only screen and (max-width: 810px){
    div.restaurant-contents{
      background-repeat: no-repeat;
      width: 100%;
      background-size: cover;
      height: auto;
    }
  }
</style>
@section('body')
<div class="container-fluid" style="padding: 0px;">
  {{--@foreach($restaurants as $restaurant)
    <div class="row">
      <div class="col-md-4">
        <img src="{{asset('public/'.$restaurant->logo)}}" class="img-responsive" alt="">
      </div>
      <div class="col-md-8">
        <a href="{{url('single-show-restaurant/'.$restaurant->id)}}" target="_blank"><h1>{{$restaurant->name}}</h1></a>
        <p class="lead">{{$restaurant->description}}</p>
        <p><strong>{{$restaurant->address}}</strong></p>
      </div>
    </div>
    @endforeach--}}
    @foreach($restaurants as $restaurant)
    <div class="row">
      <div class="col-md-12">
        <div class="restaurant-contents" style="background-image: url('{{asset('public/'.$restaurant->logo)}}');">
          <div class="inner-section">
            <h1 class="text-center white">{{$restaurant->name}}</h1>
            <p class="lead text-center white">{{$restaurant->description}}</p>
            <center><a href="{{url('single-show-restaurant/'.$restaurant->id)}}" type="button" class="btn btn-default btn-lg" target="_blank">Reserve A Table</a></center>
            <br>
            <div class="row">
              <div class="col-md-8 col-sm-offset-4 col-sm-12">
                <ul id="social-media-btns">
                  <li><a href="{{$restaurant->fb}}" target="_blank"><i class="fa fa-facebook" id="fa"></i></a></li>
                  <li><a href="{{$restaurant->google}}" target="_blank"><i class="fa fa-google-plus" id="fa"></i></a></li>
                  <li><a href="{{$restaurant->twitter}}" target="_blank"><i class="fa fa-twitter" id="fa"></i></a></li>
                  <li><a href="{{$restaurant->youtube}}" target="_blank"><i class="fa fa-youtube" id="fa"></i></a></li>
                  <li><a href="{{$restaurant->insta}}" target="_blank"><i class="fa fa-instagram" id="fa"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
</div>
@endsection
