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
    public function index($page_number=1){
        //$current_user = Auth::user();
        $races_per_page = 2;
        $races_number = Race::count();
        $pages_total = round($races_number/$races_per_page);
        
        if($page_number == 1){
            $races = Race::orderByDesc('date')->take($races_per_page)->get();
        }else{
            $races = Race::orderByDesc('date')
                ->skip(($page_number-1)*$races_per_page)
                ->take($races_per_page)->get();
        }

        $tournaments= Tournament::all();
        $jockeys = Jockey::all();
        $results = Result::orderBy('time')->get();
        $horses = Horse::all();
            
        $winners = collect();
        foreach($races as $race){
            $winner = Race::where('races.id','=',$race->id)
                ->join('results','races.id','=','results.race_id')
                ->join('horses','results.horse_id','=','horses.id')
                ->select('horses.name','results.race_id','results.time')
                ->orderBy('results.time')
                ->take(1)->get();
            $winners->push($winner);
        }

        if($races)
            return view('races.races',compact('races','tournaments','results','horses','jockeys','winners','page_number','pages_total'));
        else   
            return redirect('/races');
    }

    public function getRace($id){
        //$current_user = Auth::user();
        $races = [Race::find($id)];
        $tournaments= Tournament::where('id',$races[0]->id)->get();
        $results = Result::where('race_id',$races[0]->id)->orderBy('time')->get();
        $jockeys = Jockey::all();
        $horses = Horse::all();

        $winners = [Race::where('races.id','=',$races[0]->id)
                        ->join('results','races.id','=','results.race_id')
                        ->join('horses','results.horse_id','=','horses.id')
                        ->select('horses.name','results.race_id','results.time')
                        ->take(1)->get()];

        if($tournaments)
            return view('races.races',compact('races','tournaments','results','horses','jockeys','winners'));
        else
            return redirect('/races');
    }
}
