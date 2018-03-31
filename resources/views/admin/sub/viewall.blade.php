@extends('layouts.admin-layout')

@section('title', 'View All Sub Items')
<style media="screen">
  div.item-wrapper{
    width: 100%;
    height: auto;
    padding: 25px 25px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -ms-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -o-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    background-color: #fff;
  }
  img.img-responsive{
    width: 100px;
    height: 100px;
    border-top-left-radius: 50%;
    border-top-right-radius: 50%;
    border-bottom-left-radius: 50%;
    border-bottom-right-radius: 50%;
  }
  ul.sub-items{
    padding: inherit;
  }
  ul.sub-items > li{
    list-style-type: none;
    float: left;
    padding: 5px;
  }
</style>
@section('admin-body')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      @if(session('msg'))
      <li class="alert alert-success">{{session('msg')}}</li>
      @endif
      <form class="form-horizontal" action="{{route('sort')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <legend>Sort By Parent Item</legend>
          <select class="form-control" name="subitems" />
            <option selected disabled> -SELECT- </option>
            @foreach($id as $i)
            <option value="{{$i->title}}">{{$i->title}}</option>
            @endforeach
          </select>
        </div>
        <input type="submit" name="submit" class="btn btn-warning btn-block" value="SEARCH">
        <br>
        <a href="{{route('getMenuId')}}" type="button" class="btn btn-success btn-lg pull-right">View All Sub Items</a>
      </form>
    </div>{{-- /.col-md-12 --}}
  </div>
  <br>
  <br>
  <div class="row">
    @foreach($item as $it)
    <div class="col-md-4">
      <div class="item-wrapper">
        <center><img src="{{asset('public/'.$it->sub_image)}}" class="img-responsive" alt=""></center>
        <h1>Parent Item: {{$it->menu_title}}</h1>
        <h3>Title: <span class="lead">{{$it->sub_title}}</span></h3>
        <p>Description: {{$it->sub_description}}</p>
        <h4 class=""><strong>Price: {{$it->sub_price}}</strong></h4>
        <ul class="sub-items">
          <li><a href="{{url('admin/sub/'.$it->id.'/editSubItem')}}" type="button" class="btn btn-info btn-sm">Edit</a></li>
          <li><a href="{{url('admin/sub/viewall/'.$it->id)}}" type="button" class="btn btn-danger btn-sm">Delete</a></li>
        </ul>
      </div>
    </div>
    @endforeach
    <br>
  </div>
</div>
@endsection
