<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jockey;
use Auth;

class JockeysController extends Controller
{
    //Returns the view to list all jockeys
    public function index($page_number = 1){
        //Pagination variables definition
        $page_name = "jockeys";
        $jockeys_per_page = 5;
        //Fetch all jockeys
        $jockeys_number = Jockey::count();
        //Find the correct number of pages needed for all the jockeys
        $pages_total = ceil($jockeys_number/$jockeys_per_page);

        //Depending on the page the user wants, select the corresponding jockeys of that page
        if($page_number == 1){
            $jockeys = Jockey::orderBy('name')->take($jockeys_per_page)->get();
        }else{
            $jockeys = Jockey::orderBy('name')
                ->skip(($page_number-1)*$jockeys_per_page)
                ->take($jockeys_per_page)->get();
        }
        //Verifies that there are jockeys
        if($jockeys)
            return view('jockeys.jockeys',
                compact('jockeys','page_number','pages_total','page_name'));
        else   
            //In case there aren't jockeys, redirect to home page
            return redirect('/');
    }

    //Returns the view with the information of the selected jockey
    public function getJockey($id){
        $jockeys = Jockey::find($id);
        //Verifies that jockey exists
        if($jockeys)
            return view('jockeys.jockeys_info',compact('jockeys'));
        else
            //In case the jockey doesn't exist, redirect to jockeys list page
            return redirect('/jockeys');
    }
}
