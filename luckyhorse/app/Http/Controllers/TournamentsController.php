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
    public function index(){
        $current_user = Auth::user();
            $tournaments = Tournament::all();
            $races = Race::all();

            return view('tournaments.tournaments',compact('tournaments','races'));   
    }

    public function getTournament($id){
        //$current_user = Auth::user();
        $tournaments = [Tournament::find($id)];
        $races = Race::where('races.tournament_id',$tournaments[0]->id)->get();
        if($tournaments)
            return view('tournaments.tournaments',compact('tournaments','races'));
        else
            return redirect('/tournament');
    }
}
