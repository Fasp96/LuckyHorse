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
        $races = Race::all();

        if($page_number == 1){
            $tournaments = Tournament::orderByDesc('date')->take($tournaments_per_page)->get();
        }else{
            $tournaments = Tournament::orderByDesc('date')
                ->skip(($page_number-1)*$tournaments_per_page)
                ->take($tournaments_per_page)->get();
        }
        $races = Race::orderByDesc('date')->take($tournaments_per_page)->get();
        
        if($tournaments)
            return view('tournaments.tournaments',
                compact('tournaments','races','page_number','pages_total','page_name'));   
        else   
            return redirect('/tournaments');
        
    }

    public function getTournament($id){
        //$current_user = Auth::user();
        $tournaments = Tournament::find($id);
        $page_number = 1;
        $pages_total = 1;
        $races = Race::where('races.tournament_id',$tournaments->id)->get();
        if($tournaments)
            return view('tournaments.tournaments_info',compact('tournaments','races','page_number','pages_total'));
        else
            return redirect('/tournament');
    }
}
