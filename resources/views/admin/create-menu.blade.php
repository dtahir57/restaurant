@extends('layouts.admin-layout')
@section('title','Create Items')
<style media="screen">
</style>
@section('admin-body')
<section class="dashboard-counts section-padding">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        @if (session('message'))
          <p class="alert alert-success">{{session('message')}}</p>
        @endif
        @foreach($errors->all() as $error)
        <li class="alert alert-danger">{{$error}}</li>
        @endforeach
        <form class="form-horizontal" action="{{route('save')}}" method="post" role="form" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <legend>Title</legend>
            <input type="text" class="form-control" name="title" value="{{old('title')}}" />
          </div>
          <!-- <div class="form-group">
            <legend>Category</legend>
            <select class="form-control" name="category">
              <option selected disabled>-Select-</option>
              @foreach($category as $c)
              <option value="{{$c->Categories_name}}">{{$c->Categories_name}}</option>
              @endforeach
            </select>
          </div> -->
          <div class="form-group">
            <legend>Pick Categories</legend>
            @foreach($category as $c)
            <input type="checkbox" name="category[{{ $c->id }}]" value="{{$c->Categories_name}}" /> {{$c->Categories_name}}<br />
            @endforeach
          </div>
          <div class="form-group">
            <legend>Description</legend>
            <textarea name="desc" class="form-control" rows="8" cols="80">{{old('desc')}}</textarea>
          </div>
          <div class="form-group">
            <legend>Item Image</legend>
            <input type="file" class="form-control" name="item_img" value="{{old('item_img')}}">
          </div>
          <div class="form-group">
            <legend>Price</legend>
            <input type="number" class="form-control" name="price" value="{{old('price')}}" />
          </div>
          <input type="submit" class="btn btn-success" name="submit" value="Set the Meal" />
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
