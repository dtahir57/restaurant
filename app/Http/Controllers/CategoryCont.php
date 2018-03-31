<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Category;
class CategoryCont extends Controller
{
    public function index(){
      $categ = Category::all();
      return view('admin/category')->with('data', $categ);
    }
    public function create(Request $request){
      $this->validate($request, [
        'category' => 'required|max:255|unique:categories,Categories_name',
      ]);
      $cat = new Category;
      if (Input::hasFile('cat_img')){
        $file = Input::file('cat_img');
        $file->move('public/uploads/categories', $file->getClientOriginalName());
        $cat->Categories_name = $request->category;
        $cat->cat_img = 'uploads/categories/' . $file->getClientOriginalName();
        $cat->status = $request->status;
        $cat->save();
      }
      $categ = Category::all();
      return view('admin/category')->with('data', $categ);
    }
    public function updateStatus(Request $req, $id){
      $this->validate($req, [
        'status' => 'required',
      ]);
      $status = Category::find($id);
      $status->status = $req->status;
      $status->save();
      return back();
    }
    public function edit($id){
      $getCat = Category::find($id);
      return view('admin/edit_category')->with('data',$getCat);
    }
    public function update(Request $request){
      $find = Category::find($request->id);
      $this->validate($request, [
        'category' => 'required|max:255',
      ]);
      // $find->Categories_name = $request->category;
      // $find->save();
      if (Input::hasFile('cat_img')){
        $file = Input::file('cat_img');
        $file->move('public/uploads/categories', $file->getClientOriginalName());
        $find->Categories_name = $request->category;
        $find->cat_img = 'uploads/categories/' . $file->getClientOriginalName();
        $find->status = $request->update_status;
        $find->save();
      }
      $categ = Category::all();
      return view('admin/category')->with('data', $categ);
    }
    public function delete($id){
      $del = Category::find($id);
      $del->delete();
      $categ = Category::all();
      return view('admin/category')->with('data', $categ);
    }
}
