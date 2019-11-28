<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tournament;
use Auth;

class AddTournamentsController extends Controller
{
    //
    public function index(){
        $current_user = Auth::user();
        if($current_user){
             $tournaments = Tournament::all();
               
             return view('tournaments.add_tournament',compact('tournaments'));
        }else{
            return redirect('home');
        }
    }
}
