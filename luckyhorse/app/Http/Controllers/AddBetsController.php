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
    public function index_bet_tournament($id){
        $current_user = Auth::user();
        if($current_user){
            $tournament = Tournament::find($id);
            if($tournament){
                $horses = Race::where('races.tournament_id',$tournament->id)
                    ->join('results', 'results.race_id','=','races.id')
                    ->join('horses','horses.id','=','results.horse_id')
                    ->select('horses.id as horse_id',
                        'horses.name as horse_name')
                    ->distinct('horse_id')->get();

                $jockeys = Race::where('races.tournament_id',$tournament->id)
                    ->join('results', 'results.race_id','=','races.id')
                    ->join('jockeys','jockeys.id','=','results.jockey_id')
                    ->select('jockeys.id as jockey_id',
                        'jockeys.name as jockey_name')
                    ->distinct('jockey_id')->get();

                return view('bets.add_bet_tournament',compact('tournament','horses','jockeys'));
            }else{
                return redirect('/tournaments');
            }
        }else{
            return redirect('/login');
        }
    }

    public function index_bet_race($id){
        $current_user = Auth::user();
        if($current_user){
            $race = Race::find($id);
            if($race){
                $horses = Result::where('results.race_id',$race->id)
                    ->join('horses','horses.id','=','results.horse_id')
                    ->select('results.race_id as race_id',
                        'horses.id as horse_id',
                        'horses.name as horse_name')->get();
                        
                $jockeys = Result::where('results.race_id',$race->id)
                ->join('jockeys','jockeys.id','=','results.jockey_id')
                ->select('results.race_id as race_id',
                    'jockeys.id as jockey_id',
                    'jockeys.name as jockey_name')->get();
                
                return view('bets.add_bet_race',compact('race','horses','jockeys'));
            }else{
                return redirect('/races');
            }
        }else{
            return redirect('/login');
        }
    }

    public function add_bet_tournament(Request $request){
        $current_user = Auth::user();
        if($current_user){
            $bet = new Bet;
            $bet->user_id = $current_user->id;
            $bet->race_id = null;
            $bet->tournament_id = $request->id;
            $bet->horse_id = $request->horse;
            $bet->jockey_id = $request->jockey;
            $bet->value = $request->bet_value;
            $bet->save();

            $current_user->balance = ($current_user->balance)-($request->bet_value);
            $current_user->save();

            return redirect('/bets');;
        }else{
            return redirect('/login');
        }
    }

    public function add_bet_race(Request $request){
        $current_user = Auth::user();
        if($current_user){
            $bet = new Bet;
            $bet->user_id = $current_user->id;
            $bet->tournament_id = null;
            $bet->race_id = $request->id;
            $bet->horse_id = $request->horse;
            $bet->jockey_id = $request->jockey;
            $bet->value = $request->bet_value;
            $bet->save();

            $current_user->balance = ($current_user->balance)-($request->bet_value);
            $current_user->save();

            return redirect('/bets');;
        }else{
            return redirect('/login');
        }
    }
}
