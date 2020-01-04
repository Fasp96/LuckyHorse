<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
    public function results(){
        return $this->hasMany('App\Result');
    }

    public function bets(){
        return $this->hasMany('App\Bet');
    }
}
