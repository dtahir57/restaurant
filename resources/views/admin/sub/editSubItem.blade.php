@extends('layouts.admin-layout')

@section('title', 'Sub Item')

@section('admin-body')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-sm-offset-4" style="padding: 20px 10px;">
      <h1 class="text-center">Update Sub Items</h1>
      @foreach($errors->all() as $error)
        <li class="alert alert-danger">{{$error}}</li>
      @endforeach
      <form class="form-horizontal" action="{{url('admin/sub/viewall/'.$getId->id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-control">
          <legend>Choose An Item To Which You Want To Update A Sub Item</legend>
          <div class="form-group">
              <select class="form-control" name="menu_item">
                <option selected disabled>-SELECT-</option>
                @foreach($getMenu as $t)
                <option value="{{$t->title}}">{{$t->title}}</option>
                @endforeach
              </select>
          </div>
        </div>
        <div class="form-group">
          <legend>Sub Item Name</legend>
          <input type="text" name="sub_name" class="form-control" value="{{$getId->sub_title}}" />
        </div>
        <div class="form-group">
          <legend>Sub Item Description</legend>
          <textarea name="sub_desc" class="form-control" rows="8" cols="80">{{$getId->sub_description}}</textarea>
        </div>
        <div class="form-group">
          <legend>Upload An Image</legend>
          <input type="file" name="sub_img" class="form-control" required />
          <pre>Previously Uploaded Image</pre>
          <img src="{{asset('public/'.$getId->sub_image)}}" style="width: 100px; height: 100px;" alt="">
        </div>
        <div class="form-group">
          <legend>Price</legend>
          <input type="number" name="sub_price" class="form-control" value="{{$getId->sub_price}}">
        </div>
        <input type="submit" name="submit" class="btn btn-success btn-block" value="Set Sub Item" />
      </form>
    </div>
  </div>
</div>
@endsection
