<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageController extends Controller
{
    public function index($page_number=1){
        //$current_user = Auth::user();
        return view('manage');
    }
}
