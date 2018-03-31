<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hour;
use App\Restaurant;
use Illuminate\Support\Facades\DB;
class hoursCont extends Controller
{
    public function set(Request $request){
      $this->validate($request, [
        'opening_hr' => 'required',
        'closing_hr' => 'required',
      ]);
      $hour = new Hour;
      $hour->fromTime = $request->opening_hr;
      $hour->toTime = $request->closing_hr;
      $hour->restaurant_id = $request->restaurant_id;
      $hour->save();
      $restaurants = Restaurant::orderby('id', 'DESC')->get();
      return view('admin/manage_restaurants', compact('restaurants'));
    }
    public function updateTime(Request $req){
      $find = Hour::where('restaurant_id', $req->restaurant_id)->first();
      $find->fromTime = $req->opening_hr;
      $find->toTime = $req->closing_hr;
      $find->restaurant_id = $req->restaurant_id;
      $find->save();
      $restaurants = Restaurant::orderby('id', 'DESC')->get();
      return view('admin/manage_restaurants', compact('restaurants'))->with('timing_mesg', 'Timings Updated');
    }
}
