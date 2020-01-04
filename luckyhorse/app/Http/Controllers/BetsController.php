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
use Arr;

class BetsController extends Controller
{
    //Returns the view to list all bets
    public function index($page_number = 1){
        $current_user = Auth::user();
        //Verifies that the user is logged in
        if($current_user){
            //Pagination variables definition
            $page_name = "bets";
            $bets_per_page = 4; //Sum of race and tournament bets per page(Always Odd number!)´
            //Fetch all race bets from the user
            $race_bets_number = Bet::whereNotNull('race_id')
                ->where('user_id',$current_user->id)->count();
            //Fetch all race bets from the user
            $tournament_bets_number = Bet::whereNotNull('tournament_id')
                ->where('user_id',$current_user->id)->count();
            //Find the correct number of pages needed for all the bets
            $bets_number = max($race_bets_number, $tournament_bets_number);
            $pages_total = ceil($bets_number/($bets_per_page/2));

            //Race bets query to get all the information needed
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
                'horses.id as horse_id',
                'jockeys.id as jockey_id',
                'bets.value as value')
                ->orderByDesc('bets.created_at');

            //Tournament bets query to get all the information needed
            $tournament_bets_q= Bet::where('bets.user_id',$current_user->id)
            ->join('tournaments','tournaments.id','=','bets.tournament_id')
            ->join('horses','bets.horse_id','=','horses.id')
            ->join('jockeys','bets.jockey_id','=','jockeys.id')
            ->select('bets.id as bet_id',
                'tournaments.name as tournament_name',
                'tournaments.id as tournament_id',
                'tournaments.date as date',
                'horses.name as horse_name',
                'jockeys.name as jockey_name',
                'horses.id as horse_id',
                'jockeys.id as jockey_id',
                'bets.value as value')
                ->orderByDesc('bets.created_at');

            //Depending on the page the user wants, select the corresponding bets of that page
            if($page_number == 1){
                $race_bets_q2 = $race_bets_q->take($bets_per_page/2);
                $race_bets = $race_bets_q2->get();
                $tournament_bets_q2 = $tournament_bets_q->take($bets_per_page/2);
                $tournament_bets = $tournament_bets_q2->get();
            }else{
                $race_bets_q2 = $race_bets_q->skip(($page_number-1)*$bets_per_page/2)
                ->take($bets_per_page/2);
                $race_bets = $race_bets_q2->get();
                $tournament_bets_q2 = $tournament_bets_q->skip(($page_number-1)*$bets_per_page/2)
                ->take($bets_per_page/2);
                $tournament_bets = $tournament_bets_q2->get();
            }

            $winners_race_bets = $race_bets_q2->join('results','races.id','=','results.race_id')
            ->select('races.id as race_id', 
                'results.horse_id as horse_id',
                'results.jockey_id as jockey_id',
                'results.time as time')
                ->orderBy('results.time')
                ->take(1)->get();
                
            $winners_tournament_bets = $tournament_bets_q2
            ->join('races','races.tournament_id','=','tournaments.id')
            ->join('results','races.id','=','results.race_id')
            ->select('tournaments.id as tournament_id', 
                'results.horse_id as horse_id',
                'results.jockey_id as jockey_id',
                'results.time as time')
            ->orderBy('results.time')
            ->take(1)->get();

            return view('bets.bets',compact('race_bets','tournament_bets','winners_race_bets','winners_tournament_bets','page_number','pages_total', 'page_name'));
        }else{
            //In case the user isn't logged in, redirect to login page
            return redirect('/login');
        }
    }

    public function claim_bet($id){
        $current_user = Auth::user();
        //Verifies that the user is logged in
        if($current_user){
            $bet = Bet::find($id);
            if($bet){
                $win_prob = $this->get_wr($bet);
                        
                $new_balance = ($bet->value) * ((1-$win_prob)+1);

                //update balance
                $balance = $current_user->balance + ($new_balance);
                $current_user->balance = $balance;
                $current_user->save();

                $bet->delete();

                return view('bets.bet_claim',compact('bet','new_balance'));
            }else{
                return redirect('/bets');
            }
        }else{
            //In case the user isn't logged in, redirect to login page
            return redirect('/login');
        }
    }

    public function get_wr($bet){
        //Get every pair win rate and the sum of all win rates
        $scores = Result::where('results.race_id', $bet->race_id)
        ->join('horses','results.horse_id','=','horses.id')
        ->join('jockeys','results.jockey_id','=','jockeys.id')
        ->select('horses.id as horse_id',
            'horses.num_victories as horse_wins','horses.num_races as horse_num_races',
            'jockeys.num_victories as jockey_wins','jockeys.num_races as jockey_num_races')
        ->orderBy('time')->get();

        $win_total = 0;
        foreach($scores as $score){
            if($score->horse_num_races == 0)
                $wr_horse = 0;
            else
                $wr_horse = $score->horse_wins/$score->horse_num_races;
                
            if($score->jockey_num_races == 0)
                $wr_jockey;    
            else
                $wr_jockey = $score->jockey_wins/$score->jockey_num_races;

            $wr_both = (($wr_jockey)+($wr_horse))/2;
            $score_position = $scores->search(function ($value, $key) use($score) {
                return $value->horse_id == $score->horse_id ;
            });
            Arr::add($scores[$score_position], 'wr', $wr_both);
            $win_total += $wr_both;
        }

        //Probability to win
        foreach($scores as $score){
            if($score->horse_id==$bet->horse_id){
                return $win_prob = round(($score->wr/$win_total),2);
            }
        }
    }
}
