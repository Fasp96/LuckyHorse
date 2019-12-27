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

            //    $jockey_names = Jockey::select('name')->where('id',Result::select('jockey_id'))->where('race_id',Race::select('id'))->get();
            //   $horse_names = Horse::select('name')->where('id',Result::select('horse_id'))->where('race_id',Race::select('id'))->get();
           

             return view('races.races',compact('races','tournaments','results','horses','jockeys'));   
    }
}
