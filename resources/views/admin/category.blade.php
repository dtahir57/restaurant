@extends('layouts.admin-layout')

@section('title', 'Add Category')

@section('admin-body')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <br>
      <br>
      <form class="form-horizontal" action="{{route('createCategory')}}" method="post" enctype="multipart/form-data">
        <h1 class="text-center">Add A Category</h1>
        {{csrf_field()}}
        <div class="form-group">
          <legend>Category Name</legend>
          @if (count($errors) > 0)
          <ul>
            @foreach ($errors->all() as $error)
            <li class="alert alert-danger">{{$error}}</li>
            @endforeach
          </ul>
          @endif
          <input type="text" name="category" class="form-control" required />
        </div>
        <div class="form-group">
          <legend>Add An Image</legend>
          <input type="file" name="cat_img" class="form-control" />
        </div>
        <input type="hidden" name="status" value="Active" />
        <input type="submit" name="submit" value="Add A Category" class="btn btn-success btn-block" />
      </form>
      <br>
    </div>
    <br>
    <div class="col-md-12">
      <h1>All Available Categories</h1>
      <table class="table table-responsive text-center">
        <tr>
          <th>Category Image</th>
          <th>Category Name</th>
          <th>Category Status</th>
          <th>Change Status</th>
          <th>Update Status</th>
          <th>Update Category Name</th>
          <th>Delete A Category</th>
        </tr>
      @if (isset($data))
        @foreach($data as $ca)
        <tr>
          <td><img src="{{asset('public/'.$ca->cat_img)}}" class="img-responsive" style="width: 100px; height: 100px;" alt=""></td>
          <td>{{$ca->Categories_name}}</td>
          <td>{{$ca->status}}</td>
          <td>
            <form class="form-horizontal" action="{{URL('admin/category/updateStatus/'.$ca->id)}}" method="update">
              {{csrf_field()}}
              {{method_field('UPDATE')}}
              <div class="form-group">
                <select class="form-control" name="status" required>
                  <option disabled selected>Update Status</option>
                  <option value="Active">Active</option>
                  <option value="InActive">In Active</option>
                </select>
              </div>
          </td>
          <td>
            <input type="submit" name="update" class="btn btn-success" value="Update" />
          </form>
          </td>
          <td><a href="{{url('admin/'.$ca->id.'/edit_category/')}}" type="button" class="btn btn-info btn-sm">Edit</a></td>
          <td><a href="{{url('admin/category/'.$ca->id)}}" type="button" class="btn btn-danger btn-sm">Delete</a></td>
        </tr>
        @endforeach
      @endif
      </table>
      @if (session('success-msg'))
      <p class="alert alert-success">{{session('success-msg')}}</p>
      @endif
    </div>
  </div>
</div>

@endsection
