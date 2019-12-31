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

            /*
            $bets= Bet::where('user_id',$current_user->id)
                ->join('horses','bets.horse_id','=','horses.id')
                ->join('races','bets.race_id','=','races.id')
                ->join('tournaments','bets.tournament_id','=','tournaments.id')
                ->join('results','races.id','=','results.race_id')
                ->join('jockeys','jockeys.id','=','results.jockey_id')
                ->select('bets.user_id as user_id',
                    'horses.name as horse_name',
                    'jockeys.name as jockey_name',
                    'races.name as race_name',
                    'tournaments.name as tournament_name',
                    'bets.value as value')
                ->orderByDesc('bets.created_at')->get();
            */

                $race_bets= Bet::where('bets.user_id',$current_user->id)
                    ->join('races','races.id','=','bets.race_id')
                    ->join('horses','bets.horse_id','=','horses.id')
                    ->select('bets.id as bet_id',
                    'races.name as race_name',
                    'races.date as date',
                    'horses.name as horse_name',
                    'bets.value as value')->get();

                $tournament_bets= Bet::where('bets.user_id',$current_user->id)
                ->join('tournaments','tournaments.id','=','bets.tournament_id')
                ->join('horses','bets.horse_id','=','horses.id')
                ->select('bets.id as bet_id',
                'tournaments.name as tournament_name',
                'tournaments.date as date',
                'horses.name as horse_name',
                'bets.value as value')->get();
                

            /*
             $bets = Bet::all();
             $races = Race::all();
             $horses = Horse::all();
             $jockeys = Jockey::all();
             $tournaments = Tournament::all();


             $bets = collect();
             //foreach($bets as $bet){
                 $bets = Bet::orderByDesc('bets.value')
                     ->limit(10)
                     ->get();
                 //where('bets.id','=',$bet->id)
                     //->select('bets.value')
                     
                 //$major_values->push($major_value);
             //}
             */

             return view('bets.bets',compact('race_bets','tournament_bets'));
        }else{
            return redirect('/');
        }
    }

    public function add_bet_race($id){
        $current_user = Auth::user();
        if($current_user){
            $race = Race::find($id);
            if($race){
                return view('bets.add_bet',compact('race'));
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/');
        }
    }

    private function race_winner($race_id){
        $winning_result_id = Race::where('races.id',$race_id)
            ->join('results','results.race_id','=','races.id')
            ->orderByDesc('results.time')
            ->select('results.id as results_id')
            ->take(1)->get();

        return $winning_result_id;
    }

    private function tournament_winner($tournament_id){

        $last_race_id = Tournament::where('tournaments.id',$tournament_id)
            ->join('races','races.tournament_id','=','races.id')
            ->orderByDesc('races.date')
            ->select('races.id as race_id')
            ->take(1)->get();

        $winning_result_id = race_winner($last_race_id);

        return $winning_result_id;
    }
}
