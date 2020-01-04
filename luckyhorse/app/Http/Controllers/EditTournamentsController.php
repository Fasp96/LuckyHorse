<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tournament;
use App\Race;
use Auth;

class EditTournamentsController extends Controller
{
    //
    public function editTournament($id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $tournament = Tournament::find($id);
            if($tournament){
                return view('tournaments.edit_tournament',compact('id'));
            }else{
                return redirect('/tournaments');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }
    }

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

    public function getRaces($id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            //gets the races that don't have a tournament associated with
            $races = Race::whereNull('tournament_id')
                        ->orWhere('tournament_id', '=', $id)
                        ->get();
            return $races;
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }   
    }

    public function updateTournament(Request $request, $id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){

            $tournament = Tournament::find($id);
            if($tournament){
                $tournament->name = $request->name;
                $tournament->date = $request->initial_date . ' ' . $request->initial_time;
                $tournament->description = $request->description;
                $tournament->location = $request->location;
                
                if($request->file('tournament_photo') != null){
                    $photo = $request->file('tournament_photo');
                    $fileName = $id . '-' . $request->name . '-' .$photo->getClientOriginalName();
                    $path = 'img/tournament_photo/';
                    $file = $photo->move($path, $fileName);
                    $file_path = $path . $fileName;
                    $tournament->file_path = '/' . $file_path;
                }
                $tournament->save();

                $races = Race::where('tournament_id', '=', $id);
                $races->update(['tournament_id' => NULL]);
                
                //if isset races
                if(isset($request->races)){

                    //for each race it will update the value of the atribute tournament_id with the id of the tournament
                    for($i = 0; $i < sizeof($request->races); $i++){
                        $race = Race::where('id', '=', $request->races[$i]);
                        $race->update(['tournament_id' => $id]);
                    }
                }

                return redirect('/tournaments/'. $id);
            }else{
                return redirect('/tournaments');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }       
    }
}
