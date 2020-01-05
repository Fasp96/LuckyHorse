<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ManageController extends Controller
{
    //Returns the view with all the database management options for the admin
    public function index($page_number=1){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            return view('/manage');
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }
    }
}
