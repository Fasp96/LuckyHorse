<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Horse;
use Auth;

class HorsesController extends Controller
{
    //Returns the view to list all horses
    public function index($page_number=1){
        //Pagination variables definition
        $page_name = "horses";
        $horses_per_page = 4;
        //Fetch all horses
        $horse_number = Horse::count();
        //Find the correct number of pages needed for all the horses
        $pages_total = ceil($horse_number/$horses_per_page);
        
        //Depending on the page the user wants, select the corresponding horses of that page
        if($page_number == 1){
            $horses = Horse::orderBy('name')->take($horses_per_page)->get();
        }else{
            $horses = Horse::orderBy('name')
                ->skip(($page_number-1)*$horses_per_page)
                ->take($horses_per_page)->get();
        }
        //Verifies that there are horses
        if($horses)
            return view('horses.horses',
                compact('horses','page_number','pages_total', 'page_name'));
        else   
            //In case the aren't horses, redirect to home page
            return redirect('/');
    }

    //Returns the view with the information of the selected horse
    public function getHorse($id){
        $horses = Horse::find($id);
        //Verifies that horse exists
        if($horses)
            return view('horses.horses_info',compact('horses'));
        else
            //In case the horse doesn't exist, redirect to horses list page
            return redirect('/horses');
    }
}
