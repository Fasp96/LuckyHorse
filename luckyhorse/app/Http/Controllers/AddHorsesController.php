<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Horse;
use Auth;

class AddHorsesController extends Controller
{
    //Returns the view to add a horse
    public function index(){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            //Search for the last 10 horses added
            $horses = Horse::orderByDesc('created_at')->take(10)->get();
            return view('horses.add_horse',compact('horses'));
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }
    }

    //Creates a horse and redirect to the horses page
    public function add(Request $request){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            //Create new horse with the parameters from the request
            $horse = new Horse;
            $horse->name = $request->name;
            $horse->breed = $request->breed;
            $horse->birth_date = $request->birth_date;
            $horse->gender = $request->gender;
            $horse->num_races = $request->num_races;
            $horse->num_victories = $request->num_victories;

            //Photo file path treatment so it can be saved without problems
            $photo = $request->file('horse_photo');
            //saves photo will name-orginial photo name
            $fileName = $request->name . '-' .$photo->getClientOriginalName();
            //path to folder to save 
            $path = 'img/horse_photo/';
            //saves photo in that folder
            $file = $photo->move($path, $fileName);

            //apends all filepath to photo img/horse-photo...
            $file_path =  $path . $fileName;
            //adds the file path to the parameter
            $horse->file_path = '/' . $file_path;
            $horse->save();

            //fetches the id of the new horse, adds to the photo name and updates the file_path atribute
            $id = $horse->id;
            //creates a new file path but appends the id in the photo name
            $new_file_path = $path . $id . '-' . $fileName;
            
            // renames the photo
            rename($file_path, $new_file_path);
            //updates the file_path
            $horse->file_path = '/' . $new_file_path;
            $horse->save();

            return redirect('/add_horses');
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }
}
