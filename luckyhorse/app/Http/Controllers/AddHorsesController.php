<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Horse;
use Auth;

class AddHorsesController extends Controller
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
            $horse->birth_date = $request->birth_date;
            $horse->gender = $request->gender;
            $horse->num_races = $request->num_races;
            $horse->num_victories = $request->num_victories;

            
            $file = $request->file('horse_photo');
            $filename = $request->name . ".png";
            /*
            $file = $file->move('images/horse_photos/', $filename);
            $horse->file_path = $filename;
            */

            $horse->file_path = $request->name . ".png";

            $horse->save();
            return redirect('/horses_add');
        }else{
            return redirect('home');
        }
        
        
    }


}
