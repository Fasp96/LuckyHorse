<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tournament;
use App\Race;
use Auth;

class EditTournamentsController extends Controller
{
    //Returns the view to edit a tournament
    public function editTournament($id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $tournament = Tournament::find($id);
            //Verifies that the tournament exists
            if($tournament){
                return view('tournaments.edit_tournament',compact('id'));
            }else{
                //In case the tournament doesn't exist, redirect to tournaments list page
                return redirect('/tournaments');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }
    }

    //Get race and corresponding races
    public function getTournament($id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $tournament = Tournament::find($id);
            $races = Race::where('tournament_id', '=', $id)->get();

            return [$tournament, $races];
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }
    }

    //Get all races except the ones that have a tournament that isn't this one
    public function getRaces($id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            //gets the races that don't have a tournament associated with except this one
            $races = Race::whereNull('tournament_id')
                        ->orWhere('tournament_id', '=', $id)
                        ->get();
            return $races;
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }   
    }

    //Update tournament with the new values
    public function updateTournament(Request $request, $id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $tournament = Tournament::find($id);
            //Verifies that the tournament exists
            if($tournament){
                //Update tournament
                $tournament->name = $request->name;
                $tournament->date = $request->initial_date . ' ' . $request->initial_time;
                $tournament->description = $request->description;
                $tournament->location = $request->location;
                
                //Update tournament photo file path if is not null
                if($request->file('tournament_photo') != null){
                    //gets file
                    $photo = $request->file('tournament_photo');
                    //saves photo will id-name-orginial photo name
                    $fileName = $id . '-' . $request->name . '-' .$photo->getClientOriginalName();
                    //path to folder to save 
                    $path = 'img/tournament_photo/';
                    //saves photo in that folder
                    $file = $photo->move($path, $fileName);
                    //apends all filepath to photo img/toournament-photo...
                    $file_path = $path . $fileName;
                    //adds the file path to the parameter
                    $tournament->file_path = '/' . $file_path;
                }
                $tournament->save();

                //Remove all races from the tournament
                $races = Race::where('tournament_id', '=', $id);
                $races->update(['tournament_id' => NULL]);

                if(isset($request->races)){
                    //for each race it will associated it with the tournament
                    for($i = 0; $i < sizeof($request->races); $i++){
                        $race = Race::where('id', '=', $request->races[$i]);
                        $race->update(['tournament_id' => $id]);
                    }
                }

                return redirect('/tournaments/'. $id);
            }else{
                //In case the tournament doesn't exist, redirect to tournaments list page
                return redirect('/tournaments');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }       
    }
}
