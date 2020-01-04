<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Result;
use Auth;

class EditResultsController extends Controller

{
    //Returns the view to edit a result
    public function editResult($id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $result = Result::find($id);
            //Verifies that the result exists
            if($result){
                return view('races.race_results_edit',compact('id','result'));
            }else{
                //In case the result doesn't exist, redirect to races list page
                return redirect('/races');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }

    //Update race with the new values
    public function updateResult(Request $request, $id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $result = Result::find($id);
            //Verifies that the result exists
            if($result){
                //Update result
                $result->time = $request->time;
                $result->save();

                //Fetch horse/jockey corresponding to the result
                $horse = $result->horse;
                $jockey = $result->jockey;
                //Verifies that the horse/jockey exists
                if($horse && $jockey){
                    //If they are the winners, add 1 to the number of victories
                    if($request->winner == 'winner'){
                        $horse->num_victories += 1;
                        $jockey->num_victories += 1;
                    }
                    //Add 1 to the number of races
                    $horse->num_races += 1;
                    $jockey->num_races += 1;
                    $horse->save();
                    $jockey->save();

                    return redirect('/races/' . $result->race_id);
                }else{
                    //In case the horse/jockey doesn't exist, redirect to races list page
                    return redirect('/races');
                }
            }else{
                //In case the result doesn't exist, redirect to races list page
                return redirect('/races');
            } 
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }
}
    

