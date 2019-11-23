<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jockey extends Model
{
    //
    public function results(){
        return $this->hasMany('App\Result');
    }
}
