<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Race;
use App\Horse;
use App\Tournament;
use App\Jockey;
use App\Result;
use Auth;

class AddRacesController extends Controller
{
    //
    public function index(){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user  && $current_user->role  == "admin"){
             $races = Race::orderByDesc('created_at')->take(10)->get();
             $horses = Horse::all();
             $jockeys = Jockey::all();
             $tournaments = Tournament::all();
               
             return view('races.add_race',compact('races', 'horses', 'tournaments', 'jockeys'));
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }
    }

    public function add(Request $request){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $race = new Race;
            $race->name = $request->name;
            $race->date = $request->date . ' ' . $request->race_time;
            $race->description = $request->description;
            $race->location = $request->location;
            
            $photo = $request->file('race_photo');
            $fileName = $request->name . '-' .$photo->getClientOriginalName();
            $path = 'img/race_photo/';
            $file = $photo->move($path, $fileName);

            $file_path = $path . $fileName;
            $race->file_path = '/' . $file_path;
            $race->tournament_id = $request->add_tournament;
            $race->save();

            //fetches the id of the new race, adds to the photo name and updates the file_path atribute
            $id = $race->id;
            $new_file_path = $path . $id . '-' . $fileName;
            
            rename($file_path, $new_file_path);
            $race->file_path = '/' . $new_file_path;
            $race->save();

            //for the teams fields it fetches the number of fields and creates a new Result
            for($i = 1; $i <= $request->num_fields; $i++){
                $result = new Result;
                //fecthes the race id
                $result->race_id = $race->id;
                //fetches the id of each horse and jockey that form a team
                $horse = "horse_" . $i;
                $jockey = "jockey_" . $i;
                $result->horse_id = $request->$horse;
                $result->jockey_id = $request->$jockey;
                $result->save();
            }

            return redirect('/add_races');
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }       
    }

    public function getJockeysHorses(){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $jockeys = Jockey::all();
            $horses = Horse::all();
            return [$horses, $jockeys];
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }

    public function getTournaments(){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $tournaments = Tournament::all();
            return $tournaments;
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }
}
