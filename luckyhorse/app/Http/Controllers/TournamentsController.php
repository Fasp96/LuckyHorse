<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tournament;
use App\Race;
use App\Horse;
use App\Jockey;

use Auth;


class TournamentsController extends Controller
{
    

    public function index($page_number=1){
        //$current_user = Auth::user();
        $page_name = "tournaments";
        $tournaments_per_page = 4;
        $tournaments_number = Tournament::count();
        $pages_total = ceil($tournaments_number/$tournaments_per_page);

        if($page_number == 1){
            $tournaments = Tournament::orderByDesc('date')->take($tournaments_per_page)->get();
        }else{
            $tournaments = Tournament::orderByDesc('date')
                ->skip(($page_number-1)*$tournaments_per_page)
                ->take($tournaments_per_page)->get();
        }

        $winners = collect();
        //Get all tournaments winners
        foreach($tournaments as $tournament){
            $winner = $this->tournament_winner($tournament->id);

            $winners->push($winner);
        }

        $races = Race::orderByDesc('date')->take($tournaments_per_page)->get();
        
        if($tournaments)
            return view('tournaments.tournaments',
                compact('tournaments','races','winners','page_number','pages_total','page_name'));   
        else   
            return redirect('/tournaments');
        
    }

    public function getTournament($id){
        //$current_user = Auth::user();
        $tournaments = Tournament::find($id);
        $page_number = 1;
        $pages_total = 1;

        if($tournaments){
            $races = Race::where('races.tournament_id',$tournaments->id)->get();
            $winner = $this->tournament_winner($tournaments->id);

            return view('tournaments.tournaments_info',compact('tournaments','races','winner','page_number','pages_total'));
        }else
            return redirect('/tournament');
    }

    private function race_winner($last_race,$tournament_id){

        if($last_race->count()>0){
            $winner = Race::where('races.id',$last_race[0]->race_id)
                ->join('results','results.race_id','=','races.id')
                ->join('horses','results.horse_id','=','horses.id')
                ->join('jockeys','results.jockey_id','=','jockeys.id')
                ->join('tournaments','races.tournament_id','=','tournaments.id')
                ->orderByDesc('results.time')
                ->whereTime('results.time','>=','00:00:01')
                ->whereNotNull('results.time')
                ->select('races.id as race_id',
                    'tournaments.id as tournament_id',
                    'horses.name as horse_name',
                    'jockeys.name as jockey_name')
                ->take(1)->get();

            if($winner->count() == 0){
                $winner = Tournament::where('tournaments.id',$tournament_id)->get();
            }
        }else{
            $winner = Tournament::where('tournaments.id',$tournament_id)->get();
        }
        

        return $winner;
    }

    private function tournament_winner($tournament_id){

        $last_race = Tournament::where('tournaments.id',$tournament_id)
                ->join('races','races.tournament_id','=','tournaments.id')
                ->orderByDesc('races.date')
                ->select('races.id as race_id')
                ->take(1)->get();

        $winner = $this->race_winner($last_race,$tournament_id);

        return $winner;
    }
    
}
