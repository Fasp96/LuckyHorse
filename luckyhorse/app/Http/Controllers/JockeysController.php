<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jockey;
use Auth;

class JockeysController extends Controller
{
    public function index($page_number = 1){
        $page_name = "jockeys";
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
            return view('jockeys.jockeys',
                compact('jockeys','page_number','pages_total','page_name'));
        else   
            return redirect('/');
    }

    public function getJockey($id){
        $jockeys = Jockey::find($id);
        if($jockeys)
            return view('jockeys.jockeys_info',compact('jockeys'));
        else
            return redirect('/jockeys');
    }
}
