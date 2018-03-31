<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Cart as CartItem;
use App\Guest;
use App\User;
use App\Order;
use App\Detail;
use Auth;
use Braintree;
use Illuminate\Support\Facades\Input;
use Braintree_Transaction;
use Braintree_Customer;
use Braintree_WebhookNotification;
use Braintree_Subscription;
use Braintree_CreditCard;
use Braintree\ClientToken;
use Braintree_PaymentMethod;
use Braintree_PaymentMethodNonce;
use Illuminate\Support\Facades\DB;
class BraintreeCont extends Controller
{
  protected $subscription = false;
  public function guest(Request $request){
    if ($request->payment_method == ('Cash On Delivery')){
      return view('guest/guestview', ['get'=>$request->payment_method]);
    }elseif ($request->payment_method == ('Braintree')){
      $clientToken = ClientToken::generate();
      return view('guest/braintree', ['get'=>$request->payment_method, 'clientToken'=>$clientToken]);
    }
  }
    public function user(Request $request){
      if ($request->payment_method == ('Cash On Delivery')){
        $userId = Auth::user()->id;
        $uId = User::find($userId)->first();
        return view('users/checkout', ['get'=>$request->payment_method, 'uId'=>$uId]);
      }elseif ($request->payment_method == ('Braintree')){
        $clientToken = ClientToken::generate();
        $userId = Auth::user()->id;
        $uId = User::find($userId)->first();
        return view('users/braintree-checkout', ['get'=>$request->payment_method, 'clientToken'=>$clientToken, 'uId'=>$uId]);
      }
  }
    public function __construct(){
      //Braintree\Configuration::reset();
      $clientToken = ClientToken::generate();
      Braintree\Configuration::environment(env('sandbox'));
      Braintree\Configuration::merchantId(env('w7bpvk84t4ppk9sd'));
      Braintree\Configuration::publicKey(env('b8wsk8jbnfrfgxf4'));
      Braintree\Configuration::privateKey(env('15847ecae0a7e84acaa7b33d79f9ab65'));
    }
    public function clientToken($data = null)
    {
        return Braintree\ClientToken::generate();
    }
    public function customerAll()
    {
        return Braintree\Customer::all();
    }
    public function customerExists($data)
    {
        try {
            return Braintree\Customer::find($data);
        } catch (Exception $e) {
            return false;
        }
    }
    public function addOrder(Request $request){
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
      $result = Braintree_Transaction::sale([
        'amount' => $request->subtotal,
        'paymentMethodNonce' => $request->payment_method_nonce,
        'options' => [
          'submitForSettlement' => True
        ]
      ]);
      if ($result->success) {
          $settledTransaction = $result->transaction;
      } else {
        foreach($result->errors->deepAll() AS $error) {
        print_r($error->code . ": " . $error->message . "\n");
        }
      }
      //dd($request);
      Cart::destroy();
      return view('guest/track', compact('result'));
    }
    public function userOrder(Request $request){

      $result = Braintree_Transaction::sale([
        'amount' => $request->subtotal,
        'paymentMethodNonce' => $request->payment_method_nonce,
        'options' => [
          'submitForSettlement' => True
        ]
      ]);
      if ($result->success) {
          $settledTransaction = $result->transaction;
      } else {
        foreach($result->errors->deepAll() AS $error) {
        print_r($error->code . ": " . $error->message . "\n");
        }
      }
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
}
