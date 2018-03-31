@extends('layouts.admin-layout')

@section('title', 'Edit Item')

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
        <h1 class="text-center">Edit Item</h1>
        @endforeach
        <form class="form-horizontal" action="{{url('admin/show-menu/'.$data->id)}}" method="post" role="form" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <legend>Title</legend>
            <input type="text" class="form-control" name="title" value="{{$data->title}}" />
          </div>
          <div class="form-group">
            <legend>Description</legend>
            <textarea name="desc" class="form-control" rows="8" cols="80">{{$data->description}}</textarea>
          </div>
          <div class="form-group">
            <legend>Item Image</legend>
            <input type="file" class="form-control" name="item_img" value="{{old('item_img')}}" required>
            <pre>Image is required!</pre><p class="lead">Previously Uploaded Image</p>
            <img src="../../public/{{$data->item_img}}" class="img-responsive" style="width: 50px; height: 50px;" />
          </div>
          <div class="form-group">
            <legend>Price</legend>
            <input type="text" class="form-control" name="price" value="{{$data->price}}" />
            <input type="hidden" name="category" value="{{$data->category}}"/>
          </div>
          <input type="submit" class="btn btn-success" name="submit" value="Update Meal" />
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
