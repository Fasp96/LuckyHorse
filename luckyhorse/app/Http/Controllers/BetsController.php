<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bet;
use App\Race;
use App\Horse;
use App\Tournament;
use App\Jockey;
use App\Result;
use Auth;

class BetsController extends Controller
{
    public function index(){
        $current_user = Auth::user();
        if($current_user){
             $bets = Bet::all();
             $races = Race::all();
             $horses = Horse::all();
             $jockeys = Jockey::all();
             $tournaments = Tournament::all();


             $major_values = collect();
             //foreach($bets as $bet){
                 $major_value = Bet::orderByDesc('bets.value')
                     ->limit(2)
                     ->get();
                 //where('bets.id','=',$bet->id)
                     //->select('bets.value')
                     
                 $major_values->push($major_value);
             //}

             return view('bets.bets',compact('bets','races','horses','jockeys','tournaments','major_values'));
        }else{
            return redirect('home');
        }
    }
}
