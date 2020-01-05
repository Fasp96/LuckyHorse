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

class EditRacesController extends Controller
{
    //Returns the view to edit a race
    public function editRace($id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $race = Race::find($id);
            //Verifies that the race exists
            if($race){
                return view('races.edit_race',compact('id'));
            }else{
                //In case the race doesn't exist, redirect to races list page
                return redirect('/races');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }
    }

    //Get race and corresponding results
    public function getRace($id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $race = Race::find($id);
            $teams = Result::where('race_id', '=', $id)->get();
            
            return [$race, $teams];
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }
    
    //Get all tournaments
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

    //Update race with the new values
    public function updateRace(Request $request, $id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $race = Race::find($id);
            //Verifies that the race exists
            if($race){
                //Update race
                $race->name = $request->name;
                $race->date = $request->date . ' ' . $request->race_time;
                $race->description = $request->description;
                $race->location = $request->location;
                $race->tournament_id = $request->add_tournament;            

                //Update race photo file path if is not null
                if($request->file('race_photo') != null){
                    //gets file
                    $photo = $request->file('race_photo');
                    //saves photo will id-name-orginial photo name
                    $fileName = $id . '-' . $request->name . '-' .$photo->getClientOriginalName();
                    //path to folder to save 
                    $path = 'img/race_photo/';
                    //saves photo in that folder
                    $file = $photo->move($path, $fileName);
                    //apends all filepath to photo img/race-photo...
                    $file_path = $path . $fileName;
                    //adds the file path to the parameter
                    $race->file_path = '/' . $file_path;
                }
                $race->save();

                //Delete previous results and create new ones
                $teams = Result::where('race_id', '=', $id)->delete();
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

                return redirect('/races/'. $id);
            }else{
                //In case the race doesn't exist, redirect to races list page
                return redirect('/races');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }       
    }
}
