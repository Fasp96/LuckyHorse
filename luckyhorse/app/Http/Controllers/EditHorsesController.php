<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Horse;
use Auth;

class EditHorsesController extends Controller
{
    public function editHorse($id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $horse = Horse::find($id);
            if($horse){
                return view('horses.edit_horse',compact('id'));
            }else{
                return redirect('/horses');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }

    public function getHorse($id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $horse = Horse::find($id);

            return $horse;
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }

    public function updateHorse(Request $request, $id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $horse = Horse::find($id);
            if($horse){
                $horse->name = $request->name;
                $horse->breed = $request->breed;
                $horse->birth_date = $request->birth_date;
                $horse->gender = $request->gender;
                $horse->num_races = $request->num_races;
                $horse->num_victories = $request->num_victories;

                if($request->file('horse_photo') != null){
                    $photo = $request->file('horse_photo');
                    $fileName = $id . '-' . $request->name . '-' .$photo->getClientOriginalName();
                    $path = 'img/horse_photo/';
                    $file = $photo->move($path, $fileName);
                    $file_path = $path . $fileName;
                    $horse->file_path = '/' . $file_path;
                }
                $horse->save();

                return redirect('/horses/' . $id);
            }else{
                return redirect('/horses');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }
}
