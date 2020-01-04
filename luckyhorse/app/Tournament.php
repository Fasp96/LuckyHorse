<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    public function race(){
        return $this->hasMany('App\Race');
    }

    public function bets(){
        return $this->hasMany('App\Bet');
    }
}
