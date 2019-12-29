<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Race;


use App\Jockey;
use App\Horse;
use App\Result;
use App\Tournament;

use Auth;

class RacesController extends Controller
{
    //
    public function index(){
        $current_user = Auth::user();
             $races = Race::all();
             $tournaments= Tournament::all();

             $jockeys = Jockey::all();
             $results = Result::all();
             $horses = Horse::all();

             
                $winners = collect();
                foreach($races as $race){
                    $winner = Race::where('races.id','=',$race->id)
                        ->join('results','races.id','=','results.race_id')
                        ->join('horses','results.horse_id','=','horses.id')
                        ->select('horses.name','results.race_id','results.time')
                        ->take(1)->get();

                $winners->push($winner);
                }
               

                
             // ->orderByDesc('results.time')
             
            
             
            
            return view('races.races',compact('races','tournaments','results','horses','jockeys','winners'));   
    }
}
