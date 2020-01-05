<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jockey;
use Auth;

class EditJockeysController extends Controller
{
    //Returns the view to edit a jockey
    public function editJockey($id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $jockey = Jockey::find($id);
            //Verifies that the jockey exists
            if($jockey){
                return view('jockeys.edit_jockey',compact('jockey'));
            }else{
                //In case the horse doesn't exist, redirect to jockeys list page
                return redirect('/jockeys');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }

    //Update jockey with the new values
    public function updateJockey(Request $request, $id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $jockey = Jockey::find($id);
            //Verifies that the jockey exists
            if($jockey){
                //Update jockey
                $jockey->name = $request->name;
                $jockey->birth_date = $request->birth_date;
                $jockey->gender = $request->gender;
                $jockey->num_races = $request->num_races;
                $jockey->num_victories = $request->num_victories;

                //Update jockey photo file path if is not null
                if($request->file('jockey_photo') != null){
                    //gets file
                    $photo = $request->file('jockey_photo');
                    //saves photo will id-name-orginial photo name
                    $fileName = $id . '-' . $request->name . '-' .$photo->getClientOriginalName();
                    //path to folder to save 
                    $path = 'img/jockeys_photo/';
                    //saves photo in that folder
                    $file = $photo->move($path, $fileName);
                    //apends all filepath to photo img/jockey-photo...
                    $file_path = $path . $fileName;
                    //adds the file path to the parameter
                    $jockey->file_path = '/' . $file_path;
                }
                $jockey->save();

                return redirect('/jockeys/' . $id);
            }else{
                //In case the jockey doesn't exist, redirect to jockey list page
                return redirect('/jockeys');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }
}
