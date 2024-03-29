<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Race;
use App\Tournament;
use App\Result;
use App\Horse;
use App\Jockey;
use App\News;
use Auth;
use DB;


class WelcomeController extends Controller
{
    //Returns main page view
    public function index(){
        //Get all information needed for the Float Tables
        $races = Race::where('date', '>', DB::raw('CURDATE()'))->orderByDesc('date')->take(20)->get();
        $tournaments = Tournament::where('date', '>', DB::raw('CURDATE()'))->orderByDesc('date')->take(20)->get();

        //Get all information needed for the Last Result Tables
        $last_races = Race::where('date', '<', DB::raw('CURDATE()'))->orderByDesc('date')->take(3)->get();
        $table_infos = collect();
        foreach($last_races as $race){
            $table_info = Race::where('races.id','=',$race->id)
                ->join('results','races.id','=','results.race_id')
                ->join('horses','results.horse_id','=','horses.id')
                ->join('jockeys','results.jockey_id','=','jockeys.id')
                ->select('races.id as race_id',
                    'races.name as race_name',
                    'races.date as date',
                    'horses.id as horse_id',
                    'horses.name as horse_name',
                    'jockeys.id as jockey_id',
                    'jockeys.name as jockey_name',
                    'results.time as time')
                ->orderBy('time')->get();

            $table_infos->push($table_info);
        }
        //Get all information needed for the News
        $news = News::orderByDesc('created_at')->take(10)->get();
        //Get all information needed for the table of last minute news
        $minute_news = News::whereNotNull('minute_info')->orderByDesc('created_at')->take(10)->get();

        return view('welcome',compact('races','tournaments','last_races','table_infos','news','minute_news'));
    }
    
}
