<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Result;
use Auth;

class EditResultsController extends Controller

{
        //
        public function editResult($id){
            $current_user = Auth::user();
            if($current_user){
    
                $result = Result::find($id);
    
                return view('races.race_results_edit',compact('id','result'));
            }
        }
    
    
        public function updateResult(Request $request, $id){
            
            $user = Auth::user();
            if($user){
                $result = Result::find($id);
                $result->time = $request->time;


                $result->save();
    
                return redirect('/races/' . $result->race_id);
            }else{
                return redirect('home');
            } 
        }
}
    

