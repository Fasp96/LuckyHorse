<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    //
    public function horses(){
        return $this->belongsToMany('App\Horse','races_horses');
    }
}
