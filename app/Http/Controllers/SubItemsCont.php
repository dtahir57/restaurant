<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Menu;
use App\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
class SubItemsCont extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = Menu::all();
        return view('admin/sub/subItems', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'menu_item' => 'required',
          'sub_name' => 'required|max:255|min:3|unique:items,sub_title',
          'sub_desc' => 'required|max:300',
          'sub_img' => 'required',
          'sub_price' => 'required',
        ]);
        $req = DB::table('menus')->where('title', $request->menu_item)->first();
        if (Input::hasFile('sub_img')){
          $file = Input::file('sub_img');
          $file->move('public/uploads/subitems', $file->getClientOriginalName());
          $item = new Item;
          $item->id = rand(1000, 99999999);
          $item->menu_title = $request->menu_item;
          $item->sub_title = $request->sub_name;
          $item->sub_description = $request->sub_desc;
          $item->sub_image = 'uploads/subitems/'. $file->getClientOriginalName();
          $item->sub_price = $request->sub_price;
          $item->menu_id = $req->id;
          $item->save();
          $id = Menu::all();
          $item = Item::all();
          return view('admin/sub/viewall', compact('id', 'item'));
        }
    }

    public function getMenuId(){
        $id = Menu::all();
        $item = Item::all();
        return view('admin/sub/viewall', compact('id', 'item'));
    }

    public function sort(Request $req){
      $id = Menu::all();
      $item = DB::table('items')->where('menu_title', $req->subitems)->get();
      return view('admin/sub/viewall', compact('item', 'id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($s)
     {
       $sId = Item::find($s);
       Cart::add($sId->id,$sId->sub_title,1,$sId->sub_price);
       return back();
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $getMenu = Menu::all();
      $getId = Item::find($id)->first();
      return view('admin/sub/editSubItem', compact('getId', 'getMenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::find($id)->first();
        $this->validate($request, [
          'menu_item' => 'required',
          'sub_name' => 'required|max:255',
          'sub_desc' => 'required|max:300',
          'sub_img' => 'required',
          'sub_price' => 'required',
        ]);
        $req = DB::table('menus')->where('title', $request->menu_item)->first();
        if (Input::hasFile('sub_img')){
          $file = Input::file('sub_img');
          $file->move('public/uploads/subitems', $file->getClientOriginalName());
          $item->menu_title = $request->menu_item;
          $item->sub_title = $request->sub_name;
          $item->sub_description = $request->sub_desc;
          $item->sub_image = 'uploads/subitems/'. $file->getClientOriginalName();
          $item->sub_price = $request->sub_price;
          $item->menu_id = $req->id;
          $item->save();
          $id = Menu::all();
          $item = Item::all();
          return view('admin/sub/viewall', compact('id', 'item'))->with('msg', 'Sub Item Updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $it = Item::find($id);
        $it->delete();
        $id = Menu::all();
        $item = Item::all();
        return view('admin/sub/viewall', compact('id', 'item'))->with('msg', 'Sub Item Updated!');
    }
    public function getSubItems($menu_id){
      $s_id = Item::where('menu_id', $menu_id)->get();
      $category = Category::all();
      $menu = Menu::where('id', $menu_id)->first();
      return view('subitem', compact('s_id', 'category', 'menu'));
    }
}
