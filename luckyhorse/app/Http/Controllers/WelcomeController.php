<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Race;
use App\Tournament;
use App\Result;
use App\Horse;
use App\Jockey;
use Auth;
use DB;
use Arr;


class WelcomeController extends Controller
{
    public function index(){
        $current_user = Auth::user();
        //Float Tables
        $races = Race::where('date', '>', DB::raw('CURDATE()'))->orderByDesc('date')->get();
        $tournaments = Tournament::where('date', '>', DB::raw('CURDATE()'))->orderByDesc('date')->get();

        //Last Result Tables
        $last_races = Race::where('date', '<', DB::raw('CURDATE()'))->orderByDesc('date')->take(3)->get();
        $count = 1;
        foreach($last_races as $race){
            $results = Result::where('race_id', $race->id)->get();
            
            $table_info = Race::where('races.id','=',$race->id)
                    ->join('results','races.id','=','results.race_id')
                    ->join('horses','results.horse_id','=','horses.id')
                    ->join('jockeys','results.jockey_id','=','jockeys.id')
                    ->select('races.name as race_name',
                        'races.date as date',
                        'horses.name as horse_name',
                        'jockeys.name as jockey_name',
                        'results.time as time')
                    ->orderByDesc('time')->get();

            ${'results_'. $count} = $table_info;
            $count += 1;
        }

        return view('welcome',compact('races','tournaments','last_races','results_1','results_2','results_3'));
    }
    
}
