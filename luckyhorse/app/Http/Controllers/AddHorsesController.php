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

            
            $photo = $request->file('horse_photo');
            $fileName = $request->name . '-' .$photo->getClientOriginalName();
            $path = 'img/horse_photo/';
            $file = $photo->move($path, $fileName);

            $file_path = $path . $fileName;
            $horse->file_path = $file_path;
            $horse->save();

            //fetches the id of the new horse, adds to the photo name and updates the file_path atribute
            $id = $horse->id;
            $new_file_path = $path . $id . '-' . $fileName;
            
            rename($file_path, $new_file_path);
            $horse->file_path = $new_file_path;
            $horse->save();

            return redirect('/add_horses');
        }else{
            return redirect('home');
        } 
    }
}
