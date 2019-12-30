<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bet;
use Auth;

class BetsController extends Controller
{
    public function index(){
        $current_user = Auth::user();
        if($current_user){
             $bets = Bet::all();

             return view('bets.bets',compact('bets'));
        }else{
            return redirect('home');
        }
    }
}
