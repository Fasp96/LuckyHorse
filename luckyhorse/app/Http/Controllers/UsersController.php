<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class UsersController extends Controller
{
    //Returns the view to list all users
    public function index($page_number=1){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            //Pagination variables definition
            $page_name = "users";
            $users_per_page = 10;
            //Fetch all users
            $users_number = User::count();
            //Find the correct number of pages needed for all the users
            $pages_total = ceil($users_number/$users_per_page);

            //Depending on the page the user wants, select the corresponding users of that page
            if($page_number == 1){
                $users = User::orderBy('id')->take($users_per_page)->get();
            }else{
                $users = User::orderBy('id')
                    ->skip(($page_number-1)*$users_per_page)
                    ->take($users_per_page)->get();
            }
            //Verifies that there are users
            if($users)
                return view('users.users',compact('users','page_number','pages_total', 'page_name'));
            else   
                //In case there aren't users, redirect to home page
                return redirect('/');
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }
    }

    //Returns the view with the information of the selected user
    public function getUser($id){
        $current_user = Auth::user();
        //Verifies that the user is logged in
        if($current_user){
            $user = User::find($id);
            //Verifies that user exists and that he is the owner of the profile or the admin
            if($user && ($current_user->id == $user->id || $current_user->role == "admin")){
                return view('users.users_info',compact('user'));
            }else{
                //In case the user doesn't exist or doesn't have permission, redirect to home page
                return redirect('/');
            }
        }else{
            //In case the user isn't logged in, redirect to login page
            return redirect('/login');
        }
    }

    //Add balance to user account
    public function addBalance(Request $request, $id){        
        $current_user = Auth::user();
        //Verifies that the user is logged in
        if($current_user){
            $user = User::find($id);
            //Verifies that user exists and that he is the owner of the profile
            if($user && $current_user->id == $user->id){
                if($user){
                    //Add corresponding balance to user account
                    $user->balance = $user->balance + $request->add_balance;
                    $user->save();

                    return view('users.users_info',compact('user'));
                }
            }else{
                //In case the user doesn't exist or doesn't have permission, redirect to user profile
                return redirect('/users/' . $id);
            }
        }else{
            //In case the user isn't logged in, redirect to login page
            return redirect('/login');
        }
    }
}
