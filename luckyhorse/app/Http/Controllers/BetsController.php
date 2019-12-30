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

             return view('bets.bets',compact('bets','races','horses','jockeys','tournaments'));
        }else{
            return redirect('home');
        }
    }
}
