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
    public function editRace($id){
        $current_user = Auth::user();
        if($current_user && $current_user->role  == "admin"){
            $race = Race::find($id);
            if($race){
                return view('races.edit_race',compact('id'));
            }else{
                return redirect('/login');
            }
        }
    }

    public function getRace($id){
        $current_user = Auth::user();
        if($current_user && $current_user->role  == "admin"){
            $race = Race::find($id);
            $teams = Result::where('race_id', '=', $id)->get();
            
            return [$race, $teams];
        }else{
            return redirect('/login');
        } 
    }
    
    public function getTournaments(){
        $current_user = Auth::user();
        if($current_user && $current_user->role  == "admin"){
            $tournaments = Tournament::all();

            return $tournaments;
        }else{
            return redirect('/login');
        }   
    }

    public function updateRace(Request $request, $id){
        $current_user = Auth::user();
        if($current_user && $current_user->role  == "admin"){
            $race = Race::find($id);
            if($race){
                $race->name = $request->name;
                $race->date = $request->date . ' ' . $request->race_time;
                $race->description = $request->description;
                $race->location = $request->location;
                $race->tournament_id = $request->add_tournament;            

                if($request->file('race_photo') != null){
                    $photo = $request->file('race_photo');
                    $fileName = $id . '-' . $request->name . '-' .$photo->getClientOriginalName();
                    $path = 'img/race_photo/';
                    $file = $photo->move($path, $fileName);
                    $file_path = $path . $fileName;
                    $race->file_path = '/' . $file_path;
                }
                $race->save();

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
                return redirect('/races');
            }
        }else{
            return redirect('/login');
        }       
    }
}
