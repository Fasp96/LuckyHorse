<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Horse;
use Auth;

class HorsesController extends Controller
{
    //
    public function index(){
        $current_user = Auth::user();
             $horses = Horse::all();
             return view('horses.horses',compact('horses'));   
    }
}
