<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Restaurant;
class Reservation extends Model
{
    protected $table = 'reservations';

    public function restaurant(){
      return $this->belongsTo(Restaurant::class);
    }
}
