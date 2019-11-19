<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
    //
    public function races(){
        return $this->belongsToMany('App\Race','races_horses');
    }
}
