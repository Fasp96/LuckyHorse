<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cavalo extends Model
{
    public function races(){
        return $this->belongsToMany('App\Corrida','races_horses');
    }
}
