<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jockey;
use Auth;

class JockeysController extends Controller
{
    //
    public function index(){
        $current_user = Auth::user();
        if($current_user){
             $jockeys = Jockey::all();
             return view('jockeys.add_jockey',compact('jockeys'));
        }else{
            return redirect('home');
        }
    }

    public function add(Request $request){
        $user = Auth::user();
        if($user){

            $jockey = new Jockey;
            $jockey->name = $request->name;
            $jockey->birth_date = $request->birth_date;
            $jockey->gender = $request->gender;
            $jockey->horse_id = $request->horse_id;
            $jockey->num_races = $request->num_races;
            $jockey->num_victories = $request->num_victories;
            
            $photo = $request->file('jockey_photo');
            $fileName = $request->name . '-' .$photo->getClientOriginalName();
            $path = 'img/jockey_photo/';
            $file = $photo->move($path, $fileName);

            $file_path = $path . $fileName;
            $jockey->file_path = $file_path;
            $jockey->save();

            //fectches the id of the new jockey, adds to the photo name and updates the file_path atribute
            $id = $jockey->id;
            $new_file_path = $path . $id . '-' . $fileName;
            
            rename($file_path, $new_file_path);
            $jockey->file_path = $new_file_path;
            $jockey->save();

            return redirect('/jockeys');
        }else{
            return redirect('home');
        }
        
        
    }
}
