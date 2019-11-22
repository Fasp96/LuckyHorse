<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Race;
use Auth;

class RacesController extends Controller
{
    //
    public function index(){
        $current_user = Auth::user();
             $races = Race::all();
             return view('races',compact('races'));   
    }
}
