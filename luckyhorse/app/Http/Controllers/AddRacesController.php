<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Race;
use App\Horse;
use App\Tournament;
use App\Jockey;
use Auth;

class AddRacesController extends Controller
{
    //
    public function index(){
        $current_user = Auth::user();
        if($current_user){
             $races = Race::all();
             $horses = Horse::all();
             $jockeys = Jockey::all();
             $tournaments = Tournament::all();
               
             return view('races.add_race',compact('races', 'horses', 'tournaments', 'jockeys'));
        }else{
            return redirect('home');
        }
    }

    public function add(Request $request){
        $user = Auth::user();
        if($user){

            $race = new Race;
            $race->name = $request->name;
            $race->date = $request->date;
            $race->description = $request->description;
            $race->location = $request->location;
            
            $photo = $request->file('race_photo');
            $fileName = $request->name . '-' .$photo->getClientOriginalName();
            $path = 'img/race_photo/';
            $file = $photo->move($path, $fileName);

            $file_path = $path . $fileName;
            $race->file_path = $file_path;
            $race->tournament_id = $request->add_tournament;
            $race->save();

            //fetches the id of the new race, adds to the photo name and updates the file_path atribute
            $id = $race->id;
            $new_file_path = $path . $id . '-' . $fileName;
            
            rename($file_path, $new_file_path);
            $race->file_path = $new_file_path;
            $race->save();

            return redirect('/add_races');
        }else{
            return redirect('home');
        }       
    }

    public function getJockeysHorses(){
        $user = Auth::user();
        if($user){
            $jockeys = Jockey::all();
            $horses = Horse::all();
            return [$horses, $jockeys];
        }
    }
}