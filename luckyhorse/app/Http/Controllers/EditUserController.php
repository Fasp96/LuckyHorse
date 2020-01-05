<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class EditUserController extends Controller
{
    //Returns the view to edit a user
    public function editUser($id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $user = User::find($id);
            //Verifies that the user exists
            if($user){
                return view('users.edit_user',compact('user'));
            }else{
                //In case the user doesn't exist, redirect to users list page
                return redirect('/users');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }
    }

    //Update user with the new values
    public function updateUser(Request $request, $id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $user = User::find($id);
            //Verifies that the user exists
            if($user){
                //Update user
                $user->name = $request->name;
                $user->role = $request->role;
                $user->email = $request->email;
                $user->birth_date = $request->birth_date;
                $user->gender = $request->gender;
                $user->phone_number = $request->phone_number;
                $user->balance = $request->balance;
                $user->iban = 0;
                $user->save();

                return redirect('/users/' . $id);
            }else{
                //In case the user doesn't exist, redirect to users list page
                return redirect('/users');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }
}
