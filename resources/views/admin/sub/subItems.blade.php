@extends('layouts.admin-layout')

@section('title', 'Sub Item')

@section('admin-body')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-sm-offset-4" style="padding: 20px 10px;">
      <h1 class="text-center">Add Sub Items</h1>
      <form class="form-horizontal" action="{{route('subItems.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-control">
          <legend>Choose An Item To Which You Want To Add A Sub Item</legend>
          <div class="form-group">
              <select class="form-control" name="menu_item">
                <option selected disabled>-SELECT-</option>
                @foreach($title as $t)
                <option value="{{$t->title}}">{{$t->title}}</option>
                @endforeach
              </select>
          </div>
        </div>
        <div class="form-group">
          <legend>Sub Item Name</legend>
          <input type="text" name="sub_name" class="form-control" value="{{old('sub_name')}}" />
        </div>
        <div class="form-group">
          <legend>Sub Item Description</legend>
          <textarea name="sub_desc" class="form-control" rows="8" cols="80">{{old('sub_desc')}}</textarea>
        </div>
        <div class="form-group">
          <legend>Upload An Image</legend>
          <input type="file" name="sub_img" class="form-control" value="{{old('sub_img')}}" />
        </div>
        <div class="form-group">
          <legend>Price</legend>
          <input type="number" name="sub_price" class="form-control" value="{{old('sub_price')}}">
        </div>
        <input type="submit" name="submit" class="btn btn-success btn-block" value="Set Sub Item" />
      </form>
    </div>
  </div>
</div>
@endsection
