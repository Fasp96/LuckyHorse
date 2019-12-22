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
            $horses = Horse::all();
            $jockeys = Jockey::all();

             return view('tournaments.tournaments',compact('tournaments','races','horses','jockeys'));   
    }
}
