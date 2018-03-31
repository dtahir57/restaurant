<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Hour;
use App\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
class RestaurantCont extends Controller
{
    public function index(){
      return view('admin/restaurant');
    }

    public function create(Request $request){
      $this->validate($request, [
        'res_name' => 'required|max:225|unique:restaurants,name',
        'res_desc' => 'required',
        'res_address' => 'required',
        'res_phone' => 'required',
        'res_email' => 'required',
        'res_fb' => 'required',
        'res_google' => 'required',
        'res_twitter' => 'required',
        'res_youtube' => 'required',
        'res_insta' => 'required',
      ]);
      if (Input::hasFile('res_logo')){
        $file = Input::file('res_logo');
        $file->move('public/uploads', $file->getClientOriginalName());
        $restaurant = new Restaurant;
        $restaurant->name = $request->res_name;
        $restaurant->description = $request->res_desc;
        $restaurant->address = $request->res_address;
        $restaurant->logo = 'uploads/' . $file->getClientOriginalName();
        $restaurant->reservations = $request->reservations;
        $restaurant->phone = $request->res_phone;
        $restaurant->email = $request->res_email;
        $restaurant->fb = $request->res_fb;
        $restaurant->google = $request->res_google;
        $restaurant->twitter = $request->res_twitter;
        $restaurant->youtube = $request->res_youtube;
        $restaurant->insta = $request->res_insta;
        $restaurant->save();
        return redirect('admin/restaurant')->with('msg', 'Restaurant Added Successfully!');
      }
    }

    public function show(){
      $restaurants = Restaurant::orderby('id', 'DESC')->get();
      return view('show-restaurant', compact('restaurants'));
    }

    public function showSingle(Restaurant $restaurant){
      $restaurant = Restaurant::find($restaurant)->first();
      $reserve = DB::table('reservations')->whereIn('restaurant_id', $restaurant)->count();
      return view('single-show-restaurant', compact('restaurant', 'reserve'));
    }
    public function showAllRestaurant(){
      $restaurants = Restaurant::orderby('id', 'DESC')->get();
      return view('admin/manage_restaurants', compact('restaurants'));
    }
    public function edit($id){
      $res = Restaurant::find($id);
      return view('admin/edit_restaurant', compact('res'));
    }
    public function update(Request $request, $id){
        $get = Restaurant::find($id);
        if (Input::hasFile('res_logo')){
          $file = Input::file('res_logo');
          $file->move('public/uploads', $file->getClientOriginalName());
          $get->name = $request->res_name;
          $get->description = $request->res_desc;
          $get->address = $request->res_address;
          $get->logo = 'uploads/' . $file->getClientOriginalName();
          $get->reservations = $request->reservations;
          $get->phone = $request->res_phone;
          $get->email = $request->res_email;
          $get->fb = $request->res_fb;
          $get->google = $request->res_google;
          $get->twitter = $request->res_twitter;
          $get->youtube = $request->res_youtube;
          $get->insta = $request->res_insta;
          $get->save();
        }
        $restaurants = Restaurant::all();
        return view('admin/manage_restaurants', compact('restaurants'));
    }
    public function delete($id){
      $del = Restaurant::find($id);
      $del->delete();
      $restaurants = Restaurant::all();
      return view('admin/manage_restaurants', compact('restaurants'));
    }

    public function manageTime($id){
      $hour = Hour::where('restaurant_id', $id)->first();
      if (!empty($hour)){
        //dd($hour);
        return view('admin/update_time', compact('id', 'hour'));
      }else{
        return view('admin/manage_time', compact('id'));
      }
    }
}
