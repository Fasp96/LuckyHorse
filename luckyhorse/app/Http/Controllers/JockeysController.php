<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jockey;
use Auth;

class JockeysController extends Controller
{
    //
    public function index(){
        $current_user = Auth::user();
             $jockeys = Jockey::all();
             return view('jockeys.jockeys',compact('jockeys'));   
    }

    public function getJockey($id){
        //$current_user = Auth::user();
        $jockeys = [Jockey::find($id)];
        if($jockeys)
            return view('jockeys.jockeys',compact('jockeys'));
        else
            return redirect('/jockeys');
    }
}
