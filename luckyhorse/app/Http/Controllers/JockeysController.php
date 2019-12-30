<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jockey;
use Auth;

class JockeysController extends Controller
{
    public function index($page_number = 1){
        //$current_user = Auth::user();
        $jockeys_per_page = 3;
        $jockeys_number = Jockey::count();
        $pages_total = ceil($jockeys_number/$jockeys_per_page);

        if($page_number == 1){
            $jockeys = Jockey::orderBy('name')->take($jockeys_per_page)->get();
        }else{
            $jockeys = Jockey::orderBy('name')
                ->skip(($page_number-1)*$jockeys_per_page)
                ->take($jockeys_per_page)->get();
        }
        if($jockeys)
            return view('jockeys.jockeys',compact('jockeys','page_number','pages_total'));
        else   
            return redirect('/jockeys');
    }

    public function getJockey($id){
        //$current_user = Auth::user();
        $jockeys = [Jockey::find($id)];
        $page_number = 1;
        $pages_total = 1;
        if($jockeys)
            return view('jockeys.jockeys',compact('jockeys','page_number','pages_total'));
        else
            return redirect('/jockeys');
    }
}
