@extends('layouts.app')

@section('title', 'Sub Items')
<style media="screen">
div.wrapper{
  padding: 25px;
  background-color: #fff;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  overflow: hidden;
}
div.menu-item{
  padding: 25px 30px;
  width: 100%;
  height: auto;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
ul#category-sidebar{
  padding: 0px;
}
ul#category-sidebar > li{
  list-style-type: none;
  border-bottom: 1px solid rgba(0,0,0,0.1);
}
ul#category-sidebar > li a{
  width: 100%;
  height: 100%;
  text-decoration: none;
  color: #000;
  display: block;
  padding: 10px 10px;
}
ul#category-sidebar > li a:link,
ul#category-sidebar > li a:visited,
ul#category-sidebar > li a:active{
  color: #000;
  width: 100%;
  height: auto;
}
ul#category-sidebar > li a:hover{
  background-color: red;
  color: #fff;
}
ul#subitem{
  padding: 0;
}
ul#subitem > li{
  list-style-type: none;
}
ul#menu-btns{
  padding: 0px;
}
ul#menu-btns > li{
  list-style-type: none;
  float: left;
  padding: 7px;
}
</style>
@section('body')
<div class="menu">
  <div class="container">
    <div class="special-grids menu-grids">
      <div class="container" style="padding: 25px 25px;">
        <div class="row">
          <div class="col-md-8">
            <div class="menu-item">
              <div class="row">
                <div class="col-sm-4 col-xs-4">
                  <img src="{{asset('public/'.$menu->item_img)}}" class="img-responsive" alt="Img" />
                </div>
                <div class="col-sm-8 col-xs-8">
                  <h3>{{$menu->title}}</h3>
                  <p class="lead">{{$menu->description}}</p>
                  <h4>Price: <span style="color: red;">{{$menu->price}}$</span></h4>
                </div>
                <br>
                <ul id="menu-btns" class="pull-right">
                  <li><a href="{{url('cart/'.$menu->id.'/edit/')}}" type="button" class="btn btn-danger">Add to Cart <span class="fa fa-shopping-cart"></span></a></li>
                </ul>
              </div>
            </div>
            <br>
            <div class="wrapper">
              <h1 class="text-center">Sub Items for {{$menu->title}}</h1>
              <hr>
              @if(empty($s_id))
              <h3>N/A</h3>
                @else
                   @foreach($s_id as $s)
                    <div class="row">
                      <div class="col-xs-3">
                        <img src="{{asset('public/'.$s->sub_image)}}" class="img-responsive" style="width: 80px; height: 80px;" alt="">
                      </div>
                      <div class="col-xs-6">
                        <h4>{{$s->sub_title}}</h4>
                        <p class="text-muted">{{$s->sub_description}}</p>
                      </div>
                      <div class="col-xs-3">
                        <br>
                        <a href="{{url('cart/'.$s->id.'/show/')}}" type="button" class="btn btn-danger pull-right">{{$s->sub_price}}$ <span class="fa fa-shopping-cart"></span></a>
                      </div>
                    </div>
                   @endforeach
              @endif
            </div>
          </div>
          <div class="col-md-4">
            <div class="wrapper">
              <h1>Categories</h1>
              <ul id="category-sidebar">
                @foreach($category as $c)
                <li><a href="{{url('menu/'.$c->id)}}">{{$c->Categories_name}}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
