<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Horse;
use Auth;

class EditHorsesController extends Controller
{
    //
    public function editHorse($id){
        $current_user = Auth::user();
        if($current_user){
            $Horse = Horse::find($id);

            return view('horses.edit_horse',compact('id'));
        }
    }

    public function getHorse($id){
        $user = Auth::user();
        if($user){
            $horse = Horse::find($id);
            $horses = $horse;
            //$teams = Result::where('race_id', '=', $id)->get();
            
            return [$horse,$horses];
        }
    }
    

    public function updateHorse(Request $request, $id){
        $user = Auth::user();
        if($user){
            $horse = Horse::find($id);
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
            $horse->file_path = '/' . $file_path;
            
            $horse->save();
/*
            $horses = Horse::where('horse_id', '=', $id)->delete();


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
*/
            return redirect('/races');
        }else{
            return redirect('home');
        }       
    }
}

