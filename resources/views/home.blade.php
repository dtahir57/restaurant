@extends('layouts.app')

@section('title', 'Profile')
<style media="screen">
div.main{
  width: 100%;
  height: auto;
  display: block;
  justify-content: center;
  align-items: center;
  padding: 30px 20px;
}
  div.side-nav{
    padding: 20px 25px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -ms-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -o-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
  ul#sidebar{
    padding: 0;
  }
  ul#sidebar > li{
    list-style-type: none;
    padding: 10px;
    border-bottom: 1px solid rgba(0,0,0,0.1);
  }
  ul#sidebar > li > a:link,
  ul#sidebar > li > a:visited,
  ul#sidebar > li > a:active{
    color: #000;
    text-decoration: none;
    display: block;
    padding: inherit;
  }
  ul#sidebar > li > a:hover{
    background-color: red;
    color: #fff;
  }
  div.profile-sec{
    width: 100%;
    height: auto;
    padding: 20px 22px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -o-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -ms-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
  ul#info{
    padding: 20px;
  }
  ul#info > li{
    list-style-type: none;
    border-bottom: 1px solid rgba(0,0,0,0.1);
  }
</style>
@section('body')
<div class="container-fluid" style="padding: 20px 25px;">
    <div class="row">
        <div class="main">
          <div class="col-md-4">
            <div class="side-nav">
              <h3 class="text-center"><i class="fa fa-home"></i> User Dashboard</h3>
              <ul id="sidebar">
                <li><a href="{{route('home')}}"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="{{route('dashboard')}}"><i class="fa fa-history"></i> Order History</a></li>
                <li><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i>Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form></li>
              </ul>
            </div>
          </div>
          <div class="col-md-8">
            <div class="profile-sec">
              <h1 class="text-muted text-center">Profile Information</h1>
              <div class="row">
                <ul id="info">
                  <li><h3>Name: <span class="lead">{{$user->name}}</span></h3></li>
                  <li><h3>Phone: <span class="lead">{{$user->phone}}</span></h3></li>
                  <li><h3>Email: <span class="lead">{{$user->email}}</span></h3></li>
                  <li><h3>Address: <span class="lead">{{$user->address}}</span></h3></li>
                </ul>
              </div>
            </div>
          </div>
        </div>{{-- /.main --}}
    </div>
  </div>
@endsection
