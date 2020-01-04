<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    public function horse(){
        return $this->belongsTo('App\Horse');
    }

    public function jockey(){
        return $this->belongsTo('App\Jockey');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tournament(){
        return $this->belongsTo('App\Tournament');
    }

    public function race(){
        return $this->belongsTo('App\Race');
    }
}
