<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jockey;
use Auth;

class EditJockeysController extends Controller
{
    //{
    //
    public function editJockey($id){
        $current_user = Auth::user();
        if($current_user){
            $Jockey = Jockey::find($id);

            return view('jockeys.edit_jockey',compact('id'));
        }
    }

    public function getJockey($id){
        $user = Auth::user();
        if($user){
            $jockey = Jockey::find($id);
            $jockeys = $jockey;
            //$teams = Result::where('race_id', '=', $id)->get();
            
            return [$jockey,$jockeys];
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
            
            $photo = $request->file('jockey_photo');
            $fileName = $request->name . '-' .$photo->getClientOriginalName();
            $path = 'img/jockey_photo/';
            $file = $photo->move($path, $fileName);

            $file_path = $path . $fileName;
            $jockey->file_path = '/' . $file_path;
            
            $jockey->save();

            return redirect('/jockeys');
        }else{
            return redirect('home');
        }       
    }
}

