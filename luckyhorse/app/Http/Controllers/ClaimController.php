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
            if($bet){
                $balance = ($current_user->balance) + ($bet->value);
                $current_user->balance = $balance;
                $current_user->save();

                $bet->delete();
            }
            return view('bets.bet_claim',compact('bet'));
        }else{
            return redirect('/');
        }
    }
}
