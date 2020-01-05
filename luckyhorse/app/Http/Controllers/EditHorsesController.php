<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Horse;
use Auth;

class EditHorsesController extends Controller
{
    //Returns the view to edit a horse
    public function editHorse($id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $horse = Horse::find($id);
            //Verifies that the horse exists
            if($horse){
                return view('horses.edit_horse',compact('horse'));
            }else{
                //In case the horse doesn't exist, redirect to horses list page
                return redirect('/horses');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }

    //Update horse with the new values
    public function updateHorse(Request $request, $id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $horse = Horse::find($id);
            //Verifies that the horse exists
            if($horse){
                //Update horse
                $horse->name = $request->name;
                $horse->breed = $request->breed;
                $horse->birth_date = $request->birth_date;
                $horse->gender = $request->gender;
                $horse->num_races = $request->num_races;
                $horse->num_victories = $request->num_victories;

                //Update horse photo file path if is not null
                if($request->file('horse_photo') != null){
                    //gets file
                    $photo = $request->file('horse_photo');
                    //saves photo will id-name-orginial photo name
                    $fileName = $id . '-' . $request->name . '-' .$photo->getClientOriginalName();
                    //path to folder to save 
                    $path = 'img/horse_photo/';
                    //saves photo in that folder
                    $file = $photo->move($path, $fileName);
                    //apends all filepath to photo img/horse-photo...
                    $file_path = $path . $fileName;
                    //adds the file path to the parameter
                    $horse->file_path = '/' . $file_path;
                }
                $horse->save();

                return redirect('/horses/' . $id);
            }else{
                //In case the horse doesn't exist, redirect to horses list page
                return redirect('/horses');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }
}
