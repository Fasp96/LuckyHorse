<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Auth;

class AddNewsController extends Controller
{
    //
    public function index(){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role == "admin"){
             $news = News::orderByDesc('created_at')->take(10)->get();
             return view('news.add_news',compact('news'));
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }
    }

    public function add(Request $request){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){

            $news = new News;
            $news->title = $request->title;
            $news->minute_info = $request->abstract;
            $news->description = $request->description;
            
            $photo = $request->file('news_photo');
            $fileName = $request->name . '-' .$photo->getClientOriginalName();
            $path = 'img/news_photo/';
            $file = $photo->move($path, $fileName);

            $file_path = $path . $fileName;
            $news->file_path = '/' . $file_path;
            $news->save();

            //fetches the id of the new news, adds to the photo name and updates the file_path atribute
            $id = $news->id;
            $new_file_path = $path . $id . '-' . $fileName;
            
            rename($file_path, $new_file_path);
            $news->file_path = '/' . $new_file_path;
            $news->save();

            return redirect('/add_news');
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }       
    }
}
