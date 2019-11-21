<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jockey;
use Auth;

class JockeysController extends Controller
{
    //
    public function index(){
        $current_user = Auth::user();
        if($current_user){
             $horses = Jockey::all();
             return view('jockeys.add_jockey',compact('jockeys'));
        }else{
            return redirect('home');
        }
    }

    public function add(Request $request){
        $user = Auth::user();
        if($user){
            $jockey = new Jockey;
            $jockey->name = $request->name;
            $jockey->age = $request->age;
            $jockey->horse_id = $request->horse_id;
            $jockey->num_races = $request->num_races;
            $jockey->num_victories = $request->num_victories;
            $jockey->save();
            return redirect('/jockeys');
        }else{
            return redirect('home');
        }
        
        
    }
}
