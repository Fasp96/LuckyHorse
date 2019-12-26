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
            foreach($results as $result){
                

                //$horse_name = Horse::where('id', $result->horse_id)->select('name')->get();
                //$jockey_name = Jockey::where('id', $result->jockey_id)->select('name')->get();
                //$table_info = Arr::add($table_info,'horse_name',$horse_name,'jockey_name',$jockey_name,'time',$result->time);
                //$table_info = $table_info->combine([$horse_name,$jockey_name,$result->time]);
                //$table_info += $result->time;
            }
            
            $table_info = Race::where('races.id','=',$race->id)
                    ->join('results','races.id','=','results.race_id')
                    ->join('horses','results.horse_id','=','horses.id')
                    ->join('jockeys','results.jockey_id','=','jockeys.id')
                    ->select('races.name as race_name',
                        'races.date as date',
                        'horses.name as horse_name',
                        'jockeys.name as jockey_name',
                        'results.time as time')->get();
            

            ${'results_'. $count} = $table_info;
            //${'results_'. $count} = Result::where('race_id', $race->id)->get();
            $count += 1;
        }


        return view('welcome',compact('races','tournaments','last_races','results_1','results_2','results_3'));
    }
    
}
