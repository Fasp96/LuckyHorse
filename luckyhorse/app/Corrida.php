<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corrida extends Model
{
    //
    public function horses(){
        return $this->belongsToMany('App\Cavalo','races_horses');
    }
}
