<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Result;
use Auth;

class EditResultsController extends Controller

{
    public function editResult($id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $result = Result::find($id);

            return view('races.race_results_edit',compact('id','result'));
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }


    public function updateResult(Request $request, $id){
        
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $result = Result::find($id);
            if($result){
                $result->time = $request->time;
                $result->save();

                $horse = $result->horse;
                $jockey = $result->jockey;
                if($horse && $jockey){
                    if($request->winner == 'winner'){
                        $horse->num_victories += 1;
                        $jockey->num_victories += 1;
                    }
                    $horse->num_races += 1;
                    $jockey->num_races += 1;
                    $horse->save();
                    $jockey->save();

                    return redirect('/races/' . $result->race_id);
                }else{
                    return redirect('/races');
                }
            }else{
                return redirect('/races');
            } 
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }
}
    

