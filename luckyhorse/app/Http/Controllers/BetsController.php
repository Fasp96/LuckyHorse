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
    public function index($page_number = 1){
        $current_user = Auth::user();
        if($current_user){
            $page_name = "bets";
            $bets_per_page = 4; //Sum of race and tournament bets (Always Odd number!)
            //$bets_number = Bet::count();
            $race_bets_number = Bet::whereNotNull('race_id')
                ->where('user_id',$current_user->id)->count();
            $tournament_bets_number = Bet::whereNotNull('tournament_id')
                ->where('user_id',$current_user->id)->count();
            $bets_number = max($race_bets_number, $tournament_bets_number);
            $pages_total = ceil($bets_number/($bets_per_page/2));

            $race_bets_q= Bet::where('bets.user_id',$current_user->id)
                ->join('races','races.id','=','bets.race_id')
                ->join('horses','bets.horse_id','=','horses.id')
                ->join('jockeys','bets.jockey_id','=','jockeys.id')
                ->select('bets.id as bet_id',
                'races.name as race_name',
                'races.id as race_id',
                'races.date as date',
                'horses.name as horse_name',
                'jockeys.name as jockey_name',
                'bets.value as value');

            $tournament_bets_q= Bet::where('bets.user_id',$current_user->id)
            ->join('tournaments','tournaments.id','=','bets.tournament_id')
            ->join('horses','bets.horse_id','=','horses.id')
            ->join('jockeys','bets.jockey_id','=','jockeys.id')
            ->select('bets.id as bet_id',
            'tournaments.name as tournament_name',
            'tournaments.date as date',
            'horses.name as horse_name',
            'jockeys.name as jockey_name',
            'bets.value as value')
            ->orderByDesc('bets.created_at');

            if($page_number == 1){
                $race_bets = $race_bets_q->take($bets_per_page/2)->get();
                $tournament_bets = $tournament_bets_q->take($bets_per_page/2)->get();
            }else{
                $race_bets = $race_bets_q->skip(($page_number-1)*$bets_per_page/2)
                ->take($bets_per_page/2)->get();
                $tournament_bets = $tournament_bets_q->skip(($page_number-1)*$bets_per_page/2)
                ->take($bets_per_page/2)->get();
            }

            $races = Race::all();
            $winners = collect();
            foreach($races as $race){
                $winner = Race::where('races.id','=',$race->id)
                    ->join('results','races.id','=','results.race_id')
                    ->join('horses','results.horse_id','=','horses.id')
                    ->join('jockeys','results.jockey_id','=','jockeys.id')
                    ->select('horses.name as horse_name',
                        'jockeys.name as jockey_name',
                        'results.race_id as race_id',
                        'results.time as time')
                    ->orderBy('results.time')
                    ->take(1)->get();

                $winners->push($winner);
            }
            return view('bets.bets',compact('race_bets','tournament_bets','winners','page_number','pages_total', 'page_name'));
        }else{
            return redirect('/login');
        }
    }

    public function claim_bet($id){
        $current_user = Auth::user();
        if($current_user){
            $bet = Bet::find($id);
            if($bet){
                $balance = ($current_user->balance) + ($bet->value);
                $current_user->balance = $balance;
                $current_user->save();

                $bet->delete();

                return view('bets.bet_claim',compact('bet'));
            }else{
                return redirect('/bets');
            }
        }else{
            return redirect('/login');
        }
    }
}
