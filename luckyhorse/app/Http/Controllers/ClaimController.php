<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bet;
use App\User;
use Auth;

class ClaimController extends Controller
{
    public function claim($id){
        $current_user = Auth::user();
        if($current_user){

            $bet = Bet::find($id);
            $user = User::find($bet->user_id);
            if($user){

                $balance = ($user->balance) + ($bet->value);
                $user->balance = $balance;
                               
            }

            return view('bets.bet_claim',compact('id','bet','user'));
        }
    }


    public function updateResult(Request $request, $id){
        
        $current_user = Auth::user();
        if($current_user){
            
            $bet = Bet::find($id);

            
            //$bet = Bet::where('id', '=', $id)->delete();
            //$bet->save();

            $user = User::find($bet->user_id);
            if($user){

                $balance = ($user->balance) + ($bet->value);
                $user->balance = $balance;
                $user->save();                 
            }
            return redirect('/bets/');
        }else{
            return redirect('home');
        } 
    }
}
