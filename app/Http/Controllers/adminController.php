<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Restaurant;
use Illuminate\Support\Facades\DB;
class adminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::limit(5)->orderby('id', 'DESC')->get();
        $r = DB::table('restaurants')->count();
        $u = DB::table('users')->count();
        $c = Category::count();
        return view('admin', compact('r', 'u', 'c', 'users'));
    }
}
