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
use Arr;

class RacesController extends Controller
{
    public function index($page_number=1){
        $page_name = "races";
        $races_per_page = 2;
        $races_number = Race::count();
        $pages_total = ceil($races_number/$races_per_page);

        $races_q = Race::orderByDesc('date')->take($races_per_page)
            ->leftJoin('tournaments','races.tournament_id','=','tournaments.id')
            ->select('races.id','races.name','races.date','races.description','races.location', 'races.file_path',
            'races.tournament_id as tournament_id',
            'tournaments.name as tournament_name');
        
        if($page_number == 1){
            $races = $races_q->get();
        }else{
            $races = $races_q->skip(($page_number-1)*$races_per_page)
                ->take($races_per_page)->get();
        }
            
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

        if($races)
            return view('races.races',compact('races','winners','page_number','pages_total','page_name'));
        else   
            return redirect('/');
    }

    public function getRace($id){
        //Get every pair win rate and the sum of all win rates
        $scores = Result::where('results.race_id', $id)
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

        //All results from the race
        $results = Result::where('race_id', $id)
            ->join('races','results.race_id','=','races.id')
            ->join('horses','results.horse_id','=','horses.id')
            ->join('jockeys','results.jockey_id','=','jockeys.id')
            ->leftJoin('tournaments','races.tournament_id','=','tournaments.id')
            ->select('results.id','races.id as race_id','races.name','races.date','races.description','races.location', 'races.file_path',
                'races.tournament_id as tournament_id',
                'tournaments.name as tournament_name',
                'horses.id as horse_id','horses.name as horse_name',
                'jockeys.id as jockey_id','jockeys.name as jockey_name',
                'results.time as time')
            ->orderBy('time')->get();

        //Get the winner of the race
        $winner = $results[0];

        if($results)
            return view('races.races_info',compact('scores','win_total','results','winner'));
        else
            return redirect('/races');
    }
}
