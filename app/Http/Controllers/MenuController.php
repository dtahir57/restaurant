<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
class MenuController extends Controller
{
    public function index(){
      $category = DB::table('categories')->where('status', 'Active')->get();
      return view('admin/create-menu', compact('category'));
    }
    public function save(Request $request){
      $this->validate($request, [
        'title' => 'required|max:225|min:3|unique:menus,title',
        'category' => 'required',
        'desc' => 'required',
        'item_img' => 'required',
        'price' => 'required',
      ]);
      if (Input::hasFile('item_img')){
        $file = Input::file('item_img');
        $file->move('public/uploads', $file->getClientOriginalName());
        $menu = new Menu;
        $menu->title = $request->title;
        $menu->description = $request->desc;
        $menu->item_img = 'uploads/' . $file->getClientOriginalName();
        $menu->price = $request->price;
        $menu->save();
        foreach($request->category as $category){
          $find = Category::where('Categories_name', $category)->first();
          $menu->categories()->attach($find->id);
        }
        return redirect('admin/create-menu')->with('message', 'Item Added');
      }
    }

    public function showMenu(){
      //$menus = Menu::all();
      $menus = Menu::orderby('id', 'DESC')->get();
      $category = DB::table('categories')->where('status', 'Active')->get();
      return view('menu', compact('menus', 'category'));
    }

    public function getMenuDetails(){
      $get = Menu::orderby('id', 'DESC')->get();
      return view('admin/show-menu', compact('get'));
    }
    public function singleItem($c){
      //$cat = Category::find($c)->first();
      $cat = Category::find($c);
      $menu = $cat->menus()->get();
      //dd($menu);
      $category = DB::table('categories')->where('status', 'Active')->get();
      return view('single-Item', compact('menu', 'category', 'cat'));
    }
    public function edit($id){
      $get = Menu::find($id);
      return view('admin/edit_menu')->with('data', $get);
    }
    public function update(Request $request, $id){
      $find = Menu::find($id);
      $this->validate($request, [
        'title' => 'required|max:225|min:3',
        'category' => 'required',
        'desc' => 'required',
        'item_img' => 'required',
        'price' => 'required',
      ]);
        $req = DB::table('categories')->where('Categories_name', $request->category)->first();
      if (Input::hasFile('item_img')){
        $file = Input::file('item_img');
        $file->move('public/uploads', $file->getClientOriginalName());
        $find->title = $request->title;
        $find->category = $request->category;
        $find->description = $request->desc;
        $find->item_img = 'uploads/' . $file->getClientOriginalName();
        $find->price = $request->price;
        $find->category_id = $req->id;
        $find->save();
        $get = Menu::all();
        return view('admin/show-menu', compact('get'));
        //return view('admin/show-menu')->with('message', 'Item Updated');
      }
    }
    public function delete($id){
      $del = Menu::find($id);
      $del->delete();
      $get = Menu::all();
      return view('admin/show-menu', compact('get'));
    }
}
