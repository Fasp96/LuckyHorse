<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jockey;
use Auth;

class EditJockeysController extends Controller
{
    //
    public function editJockey($id){
        $current_user = Auth::user();
        if($current_user){

            $jockey = Jockey::find($id);

            return view('jockeys.edit_jockey',compact('id'));
        }
    }

    public function getJockey($id){
        $user = Auth::user();
        if($user){
            $jockey = Jockey::find($id);

            return $jockey;
        }
    }

    public function updateJockey(Request $request, $id){
        
        $user = Auth::user();
        if($user){
            $jockey = Jockey::find($id);
            $jockey->name = $request->name;
            $jockey->birth_date = $request->birth_date;
            $jockey->gender = $request->gender;
            $jockey->num_races = $request->num_races;
            $jockey->num_victories = $request->num_victories;

            if($request->file('jockey_photo') != null){
                $photo = $request->file('jockey_photo');
                $fileName = $id . '-' . $request->name . '-' .$photo->getClientOriginalName();
                $path = 'img/jockeys_photo/';
                $file = $photo->move($path, $fileName);
                $file_path = $path . $fileName;
                $jockey->file_path = '/' . $file_path;
            }
            $jockey->save();

            return redirect('/jockeys');
        }else{
            return redirect('home');
        } 
    }
}