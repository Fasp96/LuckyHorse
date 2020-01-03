<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class EditUserController extends Controller
{
    public function editUser($id){
        $current_user = Auth::user();
        if($current_user && $current_user->role  == "admin"){
            $user = User::find($id);
            if($user){
                return view('users.edit_user',compact('id'));
            }else{
                return redirect('/users');
            }
        }else{
            return redirect('/login');
        }
    }

    public function getUser($id){
        $current_user = Auth::user();
        if($current_user && $current_user->role  == "admin"){
            $user = User::find($id);

            return $user;
        }
    }

    public function updateUser(Request $request, $id){
        $current_user = Auth::user();
        if($current_user && $current_user->role  == "admin"){
            $user = User::find($id);
            if($user){
                $user->name = $request->name;
                $user->role = $request->role;
                $user->email = $request->email;
                $user->birth_date = $request->birth_date;
                $user->gender = $request->gender;
                $user->phone_number = $request->phone_number;
                $user->balance = $request->balance;
                $user->iban = $request->iban;

                $user->save();

                return redirect('/users/' . $id);
            }else{
                return redirect('/users');
            }
        }else{
            return redirect('/login');
        } 
    }
}
