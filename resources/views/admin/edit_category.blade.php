@extends('layouts.admin-layout')

@section('title', 'Update Category')

@section('admin-body')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <br>
      <br>
      <form class="form-horizontal" action="{{url('admin/category/'.$data->id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
          <legend>Update Category</legend>
          {{--@if (count($errors) > 0)
          <ul>
            @foreach ($errors->all() as $error)
            <li class="alert alert-danger">{{$error}}</li>
            @endforeach
          </ul>
          @endif--}}
          <input type="text" name="category" class="form-control" value="{{$data->Categories_name}}" required />
          <input type="hidden" name="id" value="{{$data->id}}">
        </div>
        <div class="form-group">
          <input type="file" name="cat_img" class="form-control" required />
          <br>
          <img src="{{asset('public/'.$data->cat_img)}}" style="width: 100px; height: 100px;" alt="">
        </div>
        <input type="hidden" name="update_status" value="{{$data->status}}">
        <input type="submit" name="submit" value="Update Category" class="btn btn-success btn-block" />
      </form>
      <br>
      @if (session('success-msg'))
      <p class="alert alert-success">{{session('success-msg')}}</p>
      @endif
    </div>
    <br>
  </div>
</div>

@endsection
