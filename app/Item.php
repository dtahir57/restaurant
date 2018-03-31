<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Menu;
class Item extends Model
{
    public function menu(){
      return $this->belongsTo('App\Menu');
    }
}
