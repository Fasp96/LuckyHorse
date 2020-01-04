<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class UsersController extends Controller
{
    public function index($page_number=1){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $page_name = "users";
            $users_per_page = 10;
            $users_number = User::count();
            $pages_total = ceil($users_number/$users_per_page);

            if($page_number == 1){
                $users = User::orderBy('id')->take($users_per_page)->get();
            }else{
                $users = User::orderBy('id')
                    ->skip(($page_number-1)*$users_per_page)
                    ->take($users_per_page)->get();
            }
            if($users)
                return view('users.users',compact('users','page_number','pages_total', 'page_name'));
            else   
                return redirect('/');
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }
    }

    public function getUser($id){
        $current_user = Auth::user();
        //Verifies that the user is logged in
        if($current_user){
            $user = User::find($id);
            if($user && $current_user->id == $user->id){
                return view('users.users_info',compact('user'));
            }else{
                return redirect('/');
            }
        }else{
            //In case the user isn't logged in, redirect to login page
            return redirect('/login');
        }
    }

    public function addBalance(Request $request, $id){        
        $current_user = Auth::user();
        //Verifies that the user is logged in
        if($current_user){
            $user = User::find($id);
            if($user && $current_user->id == $user->id){
                if($user){
                    $user->balance = $user->balance + $request->add_balance;
                    $user->save();
                    return view('users.users_info',compact('user'));
                }
            }else{
                    return redirect('/users/' . $id);
                }
        }else{
            //In case the user isn't logged in, redirect to login page
            return redirect('/login');
        }
    }
}
