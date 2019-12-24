<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Race;
use App\Tournament;
use App\Result;
use Auth;
use DB;

class WelcomeController extends Controller
{
    public function index(){
        $current_user = Auth::user();
        $races = Race::where('date', '>', DB::raw('CURDATE()'))->orderByDesc('date')->get();
        $tournaments = Tournament::where('date', '>', DB::raw('CURDATE()'))->orderByDesc('date')->get();

        $last_races = Race::orderBy('date')->take(3)->get();
        $count = 1;
        foreach($last_races as $race){
            ${'results_'. $count} = Result::where('race_id', $race->id)->get();
            $count += 1;
        }
        
        //$results = Result::where('race_id', $last_races->id)->get();

        //$first_race_results = $results_list;

        //select * from races orderedbyDesc date limit 3 where

        //select * from horses where horse_id = 

        return view('welcome',compact('races','tournaments','last_races','results_1','results_2','results_3'));
    }
    
}
