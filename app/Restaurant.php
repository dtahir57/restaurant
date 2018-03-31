<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reservation;
use App\Hour;
class Restaurant extends Model
{
    protected $table_name = 'restaurant';
    // public function hour(){
    //   $this->belongsTo('App\Hour','restaurant_id');
    // }
    public function reservation(){
      return $this->hasMany('App\Reservation');
    }
    public function hour(){
      return $this->hasOne('App\Hour');
    }

}
