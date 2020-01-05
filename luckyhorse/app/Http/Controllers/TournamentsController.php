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
    //Returns the view to list all tournaments
    public function index($page_number=1){
        //Pagination variables definition
        $page_name = "tournaments";
        $tournaments_per_page = 5;
        //Fetch all tournaments
        $tournaments_number = Tournament::count();
        //Find the correct number of pages needed for all the tournaments
        $pages_total = ceil($tournaments_number/$tournaments_per_page);

        //Depending on the page the user wants, select the corresponding tournaments of that page
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
            //Get tournament winner
            $winner = $this->tournament_winner($tournament->id);
            $winners->push($winner);
        }
        //Verifies that there are tournaments
        if($tournaments)
            return view('tournaments.tournaments',
                compact('tournaments','winners','page_number','pages_total','page_name'));   
        else   
            //In case the aren't tournaments, redirect to home page
            return redirect('/');
    }

    //Returns the view with the information of the selected tournament
    public function getTournament($id){
        $tournaments = Tournament::find($id);
        //Verifies that tournament exists
        if($tournaments){
            //Get all races from the tournament
            $races = Race::where('races.tournament_id',$tournaments->id)->get();
            //Get tournament winner
            $winner = $this->tournament_winner($tournaments->id);

            return view('tournaments.tournaments_info',compact('tournaments','races','winner'));
        }else
            //In case the tournament doesn't exist, redirect to tournaments list page
            return redirect('/tournaments');
    }

    //Get winner of race
    private function race_winner($last_race,$tournament_id){
        //Verifies that the race exists
        if($last_race->count()>0){
            //Query to find race winner
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

            //In case no winner is found, return dummy winner
            if($winner->count() == 0){
                $winner = Tournament::where('tournaments.id',$tournament_id)->get();
            }
        }else{
            //In case no race doesn't exist, return dummy winner
            $winner = Tournament::where('tournaments.id',$tournament_id)->get();
        }
        return $winner;
    }

    //Get tournament winner
    private function tournament_winner($tournament_id){
        //Query to find last race of the tournament
        $last_race = Tournament::where('tournaments.id',$tournament_id)
                ->join('races','races.tournament_id','=','tournaments.id')
                ->orderByDesc('races.date')
                ->select('races.id as race_id')
                ->take(1)->get();

        //Get last race winner of the tournament
        $winner = $this->race_winner($last_race,$tournament_id);

        return $winner;
    }
    
}
