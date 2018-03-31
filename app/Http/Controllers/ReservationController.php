<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Restaurant;
use Illuminate\Support\Facades\DB;
class ReservationController extends Controller
{
    public function store(Request $request){
      $reserve = new Reservation;
      $reserve->restaurant_id = $request->restaurant_id;
      $reserve->reservations = $request->reservations;
      $reserve->fullName = $request->full_name;
      $reserve->email = $request->reserve_email;
      $reserve->type = $request->type;
      $reserve->no_of_guests = $request->no_of_guests;
      $reserve->special_request = $request->special_request;
      $reserve->save();
      return back()->with("msgz", "You've successfully reserved a table");
    }
    public function show($id){
      //$getR = DB::table('reservations')->where('restaurant_id', $id)->get();
      $getR = Reservation::query()->orderby('id', 'DESC')->where('restaurant_id', $id)->get();
      return view('admin/manage-reservation', compact('getR'));
    }
    public function del($id){
      DB::table('reservations')->where('id', $id)->delete();
      //$del->delete();
      return back()->with('delete_msg', 'Reservation Request has been Declined!');
    }
}
