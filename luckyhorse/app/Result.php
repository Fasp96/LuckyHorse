<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public function horse(){
        return $this->belongsTo('App\Horse');
    }
    
    public function race(){
        return $this->belongsTo('App\Race');
    }

    public function jockey(){
        return $this->belongsTo('App\Jockey');
    }
}
