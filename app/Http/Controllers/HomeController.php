<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Order;
use App\Detail;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('home', compact('user'));
    }
    public function dashboard(){
      $id = Auth::user()->id;
      $history = DB::table('orders')->where('user_id', $id)->get();
      return view('users/dashboard', compact('history'));
    }
    public function createOrder(Request $request){
      // return $this->validate($request, [
      //   'u_name' => 'required',
      //   'u_phone' => 'required',
      //   'u_email' => 'required',
      //   'u_address' => 'required',
      // ]);
      $userid = Auth::user()->id;
      $orders = new Order;
      $orders->user_id = $userid;
      $orders->u_name = $request->u_name;
      $orders->u_phone = $request->u_phone;
      $orders->u_email = $request->u_email;
      $orders->u_address = $request->u_address;
      $orders->payment_method = $request->payment_method;
      $orders->save();
      $cartItems = Cart::content();
      foreach($cartItems as $c){
        $details = new Detail;
        $details->order_id = $orders->id;
        $details->products = $c->name;
        $details->qty = $c->qty;
        $details->price = $c->price * $c->qty;
        $details->subtotal = $request->subtotal;
        $details->save();
      }
      Cart::destroy();
      $history = DB::table('orders')->where('user_id', $userid)->get();
      return view('users/dashboard', compact('history'));
    }
    public function displaySingle($id){
      $details = DB::table('details')->where('order_id', $id)->get();
      return view('users/view', compact('details'));
    }
}
