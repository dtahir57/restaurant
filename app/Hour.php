<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Restaurant;
class Hour extends Model
{
    public function restaurant(){
      return $this->hasOne('App\Restaurant');
    }
}
