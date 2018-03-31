<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;
use App\Cart as CartItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Gloudemans\Shoppingcart\Facades\Cart;
class guestController extends Controller
{
    public function index(){
      return view('guest/index');
    }
    public function guest(Request $request){
      if ($request->payment_method == ('Cash On Delivery')){
        return view('guest/guestview', ['get'=>$request->payment_method]);
      }elseif ($request->payment_method == ('Braintree')){
        return view('guest/braintree', ['get'=>$request->payment_method]);
      }
    }
    public function store(Request $request){
      $this->validate($request, [
        'guest_name' => 'required|max:255',
        'guest_phone' => 'required',
        'guest_email' => 'required',
        'guest_address' => 'required',
      ]);
        $guest = new Guest;
        $guest->name = $request->guest_name;
        $guest->phone = $request->guest_phone;
        $guest->email = $request->guest_email;
        $guest->address = $request->guest_address;
        $guest->payment_method = $request->payment_method;
        $guest->save();
        $cartItems = Cart::content();
        foreach($cartItems as $cart){
          $c = new CartItem;
          $c->guest_id = $guest->id;
          $c->products = $cart->name;
          $c->qty = $cart->qty;
          $c->price = $cart->price * $cart->qty;
          $c->subtotal = $request->subtotal;
          $c->save();
        }
        Cart::destroy();
        return view('guest/track')->with('successmsg','Your Order has been placed! You\'ll get an email shortly!');
    }
    public function getall(){
      $guest = Guest::orderby('id', 'DESC')->get();
      return view('admin/guestDetails', compact('guest'));
    }
    public function getCart($id){
      $cart = DB::table('carts')->where('guest_id', $id)->get();
      return view('admin/getCart', compact('cart'));
    }
}
