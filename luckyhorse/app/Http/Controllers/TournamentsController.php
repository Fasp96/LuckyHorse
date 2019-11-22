<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tournament;
use Auth;

class TournamentsController extends Controller
{
    public function index(){
        $current_user = Auth::user();
        if($current_user){
             $tournaments = Tournament::all();
             return view('tournaments',compact('tournaments'));
        }else{
            return redirect('home');
        }
    }
}
