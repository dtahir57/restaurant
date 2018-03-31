@extends('layouts.app')

@section('title', 'Menu')
<style media="screen">
  body{
    padding: 0;
    margin: 0;
    overflow: auto;
    background-color: #F4F4F4;
    background-attachment: scroll;
  }
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
        <div class="container">
          <div class="row">
            <h1 class="lead">Our Latest Menu Items...</h1>
            <div class="col-md-8">
              @foreach ($menus as $menu)
              <div class="menu-item">
                <div class="row">
                  <div class="col-sm-4 col-xs-4">
                    <img src="{{asset('public/'.$menu->item_img)}}" class="img-responsive" alt="Img" />
                  </div>
                  <div class="col-sm-8 col-xs-8">
                    <h3>{{$menu->title}}</h3>
                    <p class="lead">{{$menu->description}}</p>
                    <h4>Price: <span style="color: red;">{{$menu->price}} $</span></h4>
                  </div>
                  <br>
                  <ul id="menu-btns" class="pull-right">
                    <li><a href="{{url('cart/'.$menu->id.'/edit/')}}" type="button" class="btn btn-danger">Add to Cart <span class="fa fa-shopping-cart"></span></a></li>
                    <li><a href="{{url('subitem/getSubItems/'.$menu->id)}}" type="button" class="btn btn-success">View More</a></li>
                  </ul>
                </div>
              </div>
              <br>
              @endforeach
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
    </div><!-- /.special-grid -->
  </div>
</div>
@endsection
