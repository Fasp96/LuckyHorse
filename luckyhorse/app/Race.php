<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    public function results(){
        return $this->hasMany('App\Result');
    }

    public function bets(){
        return $this->hasMany('App\Bet');
    }

    public function tournament(){
        return $this->belongsTo('App\Tournament');
    }
}
