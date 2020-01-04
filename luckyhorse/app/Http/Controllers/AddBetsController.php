<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tournament;
use App\Race;
use App\Result;
use App\Bet;
use Auth;

class AddBetsController extends Controller
{
    //Returns the view for the user to bet on a tournament
    public function index_bet_tournament($id){
        $current_user = Auth::user();
        //Verifies that user is logged in
        if($current_user){
            $tournament = Tournament::find($id);
            if($tournament){
                //Searchs all the information needed related to the tournament choosen
                $results = Race::where('races.tournament_id',$tournament->id)
                    ->join('results', 'results.race_id','=','races.id')
                    ->join('jockeys','jockeys.id','=','results.jockey_id')
                    ->join('horses','horses.id','=','results.horse_id')
                    ->select('horses.id as horse_id',
                        'horses.name as horse_name',
                        'jockeys.id as jockey_id',
                        'jockeys.name as jockey_name')
                    ->distinct('horse_id', 'jockey_id')->get();

                return view('bets.add_bet_tournament',compact('tournament','results'));
            }else{
                //In case the tournament isn't found, redirect to tournaments page list
                return redirect('/tournaments');
            }
        }else{
            //In case the user isn't logged in, redirect to login page
            return redirect('/login');
        }
    }

    //Returns the view for the user to bet on a race
    public function index_bet_race($id){
        $current_user = Auth::user();
        //Verifies that user is logged in
        if($current_user){
            $race = Race::find($id);
            if($race){
                //Searchs all the information needed related to the race choosen
                $results = Result::where('results.race_id',$race->id)
                    ->join('horses','horses.id','=','results.horse_id')
                    ->join('jockeys','jockeys.id','=','results.jockey_id')
                    ->select('results.race_id as race_id',
                        'jockeys.id as jockey_id',
                        'jockeys.name as jockey_name',
                        'horses.id as horse_id',
                        'horses.name as horse_name')->get();
                
                return view('bets.add_bet_race',compact('race','results'));
            }else{
                //In case the race isn't found, redirect to races page list
                return redirect('/races');
            }
        }else{
            //In case the user isn't logged in, redirect to login page
            return redirect('/login');
        }
    }

    //Creates a tournaments bet and redirect to the bets page
    public function add_bet_tournament(Request $request){
        $current_user = Auth::user();
        //Verifies that user is logged in
        if($current_user){
            //Create new bet with the parameters from the request
            $bet = new Bet;
            $bet->user_id = $current_user->id;
            $bet->race_id = null;
            $bet->tournament_id = $request->id;
            //Cut the value from pair to get the horse id and the jockey id
            $pair = $request->pair;
            $bet->horse_id = substr($pair, 0, strpos($pair,"_"));
            $bet->jockey_id = substr($pair, strpos($pair,"_")+1,strlen($pair)-1);
            $bet->value = $request->bet_value;
            $bet->save();

            //User balance is updated after deducting the betted value
            $current_user->balance = ($current_user->balance)-($request->bet_value);
            $current_user->save();

            return redirect('/bets');;
        }else{
            //In case the user isn't logged in, redirect to login page
            return redirect('/login');
        }
    }

    //Creates a race bet and redirect to the bets page
    public function add_bet_race(Request $request){
        $current_user = Auth::user();
        //Verifies that user is logged in
        if($current_user){
            //Create new bet with the parameters from the request
            $bet = new Bet;
            $bet->user_id = $current_user->id;
            $bet->race_id = $request->id;
            $bet->tournament_id = null;
            //Cut the value from pair to get the horse id and the jockey id
            $pair = $request->pair;
            $bet->horse_id = substr($pair, 0, strpos($pair,"_"));
            $bet->jockey_id = substr($pair, strpos($pair,"_")+1,strlen($pair)-1);
            $bet->value = $request->bet_value;
            $bet->save();

            //User balance is updated after deducting the betted value
            $current_user->balance = ($current_user->balance)-($request->bet_value);
            $current_user->save();

            return redirect('/bets');;
        }else{
            //In case the user isn't logged in, redirect to login page
            return redirect('/login');
        }
    }
}
