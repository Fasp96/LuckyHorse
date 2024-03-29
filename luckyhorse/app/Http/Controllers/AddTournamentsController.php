<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tournament;
use App\Race;
use Auth;

class AddTournamentsController extends Controller
{
    //Returns the view to add a jockey
    public function index(){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            //Search for the last 10 jockeys added
            $tournaments = Tournament::orderByDesc('created_at')->take(10)->get();

            return view('tournaments.add_tournament',compact('tournaments'));
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
            //Create new news with the parameters from the request
            $tournament = new Tournament;
            $tournament->name = $request->name;
            $tournament->date = $request->initial_date . ' ' . $request->initial_time;
            $tournament->description = $request->description;
            $tournament->location = $request->location;
            
            //Photo file path treatment so it can be saved without problems
            $photo = $request->file('tournament_photo');
            //saves photo will name-orginial photo name
            $fileName = $request->name . '-' .$photo->getClientOriginalName();
            //path to folder to save 
            $path = 'img/tournament_photo/';
            //saves photo in that folder
            $file = $photo->move($path, $fileName);

            //apends all filepath to photo img/tournament-photo...
            $file_path = $path . $fileName;
            //adds the file path to the parameter
            $tournament->file_path = '/' . $file_path;
            $tournament->save();

            //fetches the id of the new tournament, adds to the photo name and updates the file_path atribute
            $id = $tournament->id;
            //creates a new file path but appends the id in the photo name
            $new_file_path = $path . $id . '-' . $fileName;
            
            // renames the photo
            rename($file_path, $new_file_path);
            //updates the file_path
            $tournament->file_path = '/' . $new_file_path;
            $tournament->save();

            //if isset races
            if(isset($request->races)){

                //for each race it will update the value of the atribute tournament_id with the id of the tournament
                for($i = 0; $i < sizeof($request->races); $i++){
                    $race = Race::where('id', '=', $request->races[$i]);
                    $race->update(['tournament_id' => $id]);
                }
            }

            return redirect('/add_tournaments');
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }       
    }

    //Get all races that don't aren't from a tournament
    public function getRaces(){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            //gets the races that don't have a tournament associated with it
            $races = Race::whereNull('tournament_id')->get();

            return $races;
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }
}
