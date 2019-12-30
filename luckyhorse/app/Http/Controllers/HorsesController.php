<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Horse;
use Auth;

class HorsesController extends Controller
{
    public function index($page_number=1){
        //$current_user = Auth::user();
        $horses_per_page = 4;
        $horse_number = Horse::count();
        $pages_total = ceil($horse_number/$horses_per_page);
        if($page_number == 1){
            $horses = Horse::orderBy('name')->take($horses_per_page)->get();
        }else{
            $horses = Horse::orderBy('name')
                ->skip(($page_number-1)*$horses_per_page)
                ->take($horses_per_page)->get();
        }
        if($horses)
            return view('horses.horses',compact('horses','page_number','pages_total'));
        else   
            return redirect('/horses');
    }

    public function getHorse($id){
        //$current_user = Auth::user();
        $horses = Horse::find($id);
        $page_number = 1;
        $pages_total = 1;
        if($horses)
            return view('horses.horses_info',compact('horses','page_number','pages_total'));
        else
            return redirect('/horses');
    }
}
