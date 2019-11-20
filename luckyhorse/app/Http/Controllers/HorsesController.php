<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Horse;
use Auth;

class HorsesController extends Controller
{
    public function index(){
        $current_user = Auth::user();
        if($current_user){
             $horses = Horse::all();
             return view('horses.add_horse',compact('horses'));
        }else{
            return redirect('home');
        }
    }

    public function add(Request $request){
        $user = Auth::user();
        if($user){
            $horse = new Horse;
            $horse->name = $request->name;
            $horse->breed = $request->breed;
            $horse->age = $request->age;
            $horse->num_races = $request->num_races;
            $horse->num_victories = $request->num_victories;
            $horse->save();
            return redirect('/horses');
        }else{
            return redirect('home');
        }
        
        
    }


}
