<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jockey;
use App\Horse;
use Auth;

class AddJockeysController extends Controller
{
    //Returns the view to add a jockey
    public function index(){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            //Search for the last 10 jockeys added
             $jockeys = Jockey::orderByDesc('created_at')->take(10)->get();
               
             return view('jockeys.add_jockey',compact('jockeys'));
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }
    }

    //Creates a jockey and redirect to the jockeys page
    public function add(Request $request){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            //Create new jockey with the parameters from the request
            $jockey = new Jockey;
            $jockey->name = $request->name;
            $jockey->birth_date = $request->birth_date;
            $jockey->gender = $request->gender;
            $jockey->num_races = $request->num_races;
            $jockey->num_victories = $request->num_victories;
            
            //Photo file path treatment so it can be saved without problems
            $photo = $request->file('jockey_photo');
            $fileName = $request->name . '-' .$photo->getClientOriginalName();
            $path = 'img/jockey_photo/';
            $file = $photo->move($path, $fileName);

            $file_path = $path . $fileName;
            $jockey->file_path = '/' . $file_path;
            $jockey->save();

            //fetches the id of the new jockey, adds to the photo name and updates the file_path atribute
            $id = $jockey->id;
            $new_file_path = $path . $id . '-' . $fileName;
            
            rename($file_path, $new_file_path);
            $jockey->file_path = '/' . $new_file_path;
            $jockey->save();

            return redirect('/add_jockeys');
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }       
    }
}
