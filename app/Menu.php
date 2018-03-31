<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Item;
class Menu extends Model
{
  protected $table = 'menus';
  protected $fillable = ['title', 'category', 'desc', 'item_img', 'price'];
  public function categories(){
    return $this->belongsToMany('App\Category');
  }
  public function item(){
    return $this->hasMany('App\Item');
  }
}
